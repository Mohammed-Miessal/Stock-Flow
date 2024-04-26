<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Ramsey\Uuid\Uuid;
use App\Models\Product;
use App\Events\ProductUpdated;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\CustomerService;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    protected $order ;
    protected $customer;
    protected $product;

    public function __construct(OrderService $order , CustomerService $customer , ProductService $product)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->order->index();
        return view('chapters.Order.read', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = $this->customer->index();
        // $products = $this->product->index();
        $products = get_active_products();
  
        // Préparez les noms et les prix des produits dans des tableaux associatif
        $productPrices = [];
        $productNames = [];
        foreach ($products as $product) {
            $productPrices[$product->id] = $product->price;
            $productNames[$product->id] = $product->name;      
        }
    
        return view('chapters.Order.create', compact('customers', 'products', 'productPrices' , 'productNames'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreOrderRequest $request)
    // {
    //     // Valider les données de la requête
    //     $data = $request->validated();

    //     // Générer un UUID
    //     $uuid = Uuid::uuid4()->toString();
        
    //     // Ajouter l'UUID aux données à insérer
    //     $data['uuid'] = $uuid;
        
    //     // Créer une commande avec les données validées
    //     $order = $this->order->store($data);
        
    //     // Récupérer la chaîne JSON représentant les produits depuis la requête
    //     $productsJson = $request->input('products');
        
    //     // Décoder la chaîne JSON en un tableau associatif
    //     $productsArray = json_decode($productsJson, true);
        
    //     // Parcourir chaque produit et l'attacher à la commande avec la quantité
    //     foreach ($productsArray as $product) {
    //     // Ajouter la relation many-to-many entre la commande et le produit avec la quantité
    //     $order->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'total_per_product' => $product['total']]);
        
    //     // Décrémenter la quantité du produit dans la base de données
    //     $productModel = $this->product->show($product['product_id']);
    //     $productModel->quantity -= $product['quantity'];
    //     $productModel->save();

    //     // Vérifier si la quantité est maintenant zéro et déclencher l'événement pour mettre à jour le statut du produit
    //     if ($productModel->quantity === 0) {   
    //         event(new ProductUpdated($productModel)) ;
    //     }
    //     }
        
    //     // Rediriger vers la page de création de commande
    //     return redirect()->route('order.index');
    // }
    public function store(StoreOrderRequest $request)
    {
        // Valider les données de la requête
        $data = $request->validated();
    
        // Générer un UUID
        $uuid = Uuid::uuid4()->toString();
        
        // Ajouter l'UUID aux données à insérer
        $data['uuid'] = $uuid;
        
        // Récupérer la chaîne JSON représentant les produits depuis la requête
        $productsJson = $request->input('products');
        
        // Décoder la chaîne JSON en un tableau associatif
        $productsArray = json_decode($productsJson, true);
        
        // Initialiser une variable pour stocker la quantité totale commandée
        $totalQuantityOrdered = 0;
    
        // Parcourir chaque produit et vérifier la quantité disponible
        foreach ($productsArray as $product) {
            $productId = $product['product_id'];
            $quantity = $product['quantity'];
            $productModel = $this->product->show($productId);
    
            // Vérifier si la quantité saisie dépasse la quantité disponible
            if ($productModel->quantity < $quantity) {
                return redirect()->back()->with('error', 'La quantité saisie pour le produit "'.$productModel->name.'" dépasse la quantité disponible.');
            }
    
            // Ajouter la quantité du produit à la quantité totale commandée
            $totalQuantityOrdered += $quantity;
        }
    
        // Créer une commande avec les données validées après avoir vérifié toutes les quantités
        $order = $this->order->store($data);
    
        // Vérifier si la quantité totale commandée dépasse la quantité disponible pour l'un des produits
        // if ($totalQuantityOrdered > $availableQuantity) {
        //     return redirect()->back()->with('error', 'La quantité totale commandée dépasse la quantité disponible en stock.');
        // }
    
        // Parcourir à nouveau chaque produit pour les attacher à la commande avec la quantité
        foreach ($productsArray as $product) {
            $productId = $product['product_id'];
            $quantity = $product['quantity'];
            $productModel = $this->product->show($productId);
    
            // Ajouter la relation many-to-many entre la commande et le produit avec la quantité
            $order->products()->attach($productId, ['quantity' => $quantity, 'total_per_product' => $product['total']]);
    
            // Décrémenter la quantité du produit dans la base de données
            $productModel->quantity -= $quantity;
            $productModel->save();
    
            // Vérifier si la quantité est maintenant zéro et déclencher l'événement pour mettre à jour le statut du produit
            if ($productModel->quantity === 0) {   
                event(new ProductUpdated($productModel));
            }
        }
        
        // Rediriger vers la page de création de commande
        return redirect()->route('order.index');
    }
    

    
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = $this->order->show($order->id);
        return view('chapters.Order.show', compact('order'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
    $customers = $this->customer->index();
    $products = get_active_products();
    $order = $this->order->show($order->id);

    // Récupérer tous les produits associés à la commande
    $orderProducts = $order->products()->get();

    // Préparez les prix des produits dans un tableau associatif
    $productPrices = [];
    $productNames = [];
    foreach ($products as $product) {
        $productPrices[$product->id] = $product->price;
        $productNames[$product->id] = $product->name;
    }

    // Convertir les données des produits de la commande en format JSON
    $orderProductsJson = $orderProducts->map(function ($product) {
        return [
            'product_id' => $product->id,
            'quantity' => $product->pivot->quantity,
            'total' => $product->pivot->total_per_product,
        ];
    });

    // // Affecter les données des produits de la commande à la valeur de l'input product-input
    // $orderProductsJson = $orderProductsJson->toJson();
    return view('chapters.Order.edit', compact('order', 'customers', 'products', 'productPrices', 'productNames', 'orderProductsJson'));
    }   

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateOrderRequest $request, Order $order)
{
    $data = $request->validated();
    
    // Mettre à jour la commande avec les données validées
    $order->update($data);

    // Récupérer la chaîne JSON représentant les produits depuis la requête
    $productsJson = $request->input('products');

    // Décoder la chaîne JSON en un tableau associatif
    $productsArray = json_decode($productsJson, true);

    // Récupérer les IDs des produits de la mise à jour
    $updatedProductIds = collect($productsArray)->pluck('product_id');

    // Parcourir chaque produit dans la commande existante
    foreach ($order->products as $existingProduct) {
        // Vérifier si le produit existe dans la mise à jour
        if (!in_array($existingProduct->id, $updatedProductIds->toArray())) {
            // Supprimer le produit de la commande s'il n'existe pas dans la mise à jour
            $order->products()->detach($existingProduct->id);

            // Rétablir la quantité du produit dans le stock
            $existingProduct->quantity += $existingProduct->pivot->quantity;
            $existingProduct->save();
            
            // Déclencher l'événement si la quantité est maintenant zéro
            if ($existingProduct->quantity === 0) {   
                event(new ProductUpdated($existingProduct));
            }
        }
    }

    // Parcourir chaque produit dans les nouveaux produits
    foreach ($productsArray as $product) {
        // Récupérer le produit de l'ancienne commande s'il existe
        $existingProduct = $order->products()->where('product_id', $product['product_id'])->first();

        if ($existingProduct) {
            // Mettre à jour la quantité et le total du produit dans la commande
            $existingProduct->pivot->quantity = $product['quantity'];
            $existingProduct->pivot->total_per_product = $product['total'];
            $existingProduct->pivot->save();
        } else {
            // Ajouter le produit à la commande s'il n'existe pas encore
            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'total_per_product' => $product['total']]);
            // Décrémenter la quantité du produit dans la base de données
            $productModel = Product::findOrFail($product['product_id']);
            $productModel->quantity -= $product['quantity'];
            $productModel->save();

            // Vérifier si la quantité est maintenant zéro et déclencher l'événement pour mettre à jour le statut du produit
            if ($productModel->quantity === 0) {   
                event(new ProductUpdated($productModel));
            }
        }
    }

    // Rediriger vers la page de création de commande
    return redirect()->route('order.index');
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $this->order->destroy($order->id);
        return redirect()->route('order.index');
    }
}
