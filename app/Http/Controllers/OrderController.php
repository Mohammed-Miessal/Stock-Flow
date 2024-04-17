<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Ramsey\Uuid\Uuid;
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
        $products = $this->product->index();
        
        // Préparez les prix des produits dans un tableau associatif
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
    public function store(StoreOrderRequest $request)
    {
        // Valider les données de la requête
        $data = $request->validated();

        // Générer un UUID
        $uuid = Uuid::uuid4()->toString();
        
        // Ajouter l'UUID aux données à insérer
        $data['uuid'] = $uuid;
        
        // Créer une commande avec les données validées
        $order = $this->order->store($data);
        
        // Récupérer la chaîne JSON représentant les produits depuis la requête
        $productsJson = $request->input('products');
        
        // Décoder la chaîne JSON en un tableau associatif
        $productsArray = json_decode($productsJson, true);
        
        // Parcourir chaque produit et l'attacher à la commande avec la quantité
        foreach ($productsArray as $product) {
        // Ajouter la relation many-to-many entre la commande et le produit avec la quantité
            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'total_per_product' => $product['total']]);
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
        $products = $this->product->index();
        $order = $this->order->show($order->id);
        // Préparez les prix des produits dans un tableau associatif
        $productPrices = [];
        $productNames = [];
        foreach ($products as $product) {
            $productPrices[$product->id] = $product->price;
            $productNames[$product->id] = $product->name;      
        }

        return view('chapters.Order.edit' , compact('order' , 'customers' , 'products' , 'productPrices' , 'productNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
            $data = $request->validated();

            // Générer un UUID
            $uuid = Uuid::uuid4()->toString();
        
            // Ajouter l'UUID aux données à insérer
            $data['uuid'] = $uuid;
        
            // Mettre à jour la commande avec les données validées
            $order = $this->order->update($order->id , $data );

            // Récupérer la chaîne JSON représentant les produits depuis la requête
            $productsJson = $request->input('products');

            // Décoder la chaîne JSON en un tableau associatif
            $productsArray = json_decode($productsJson, true);

            // Supprimer tous les produits de la commande
            $order->products()->detach();

            // Parcourir chaque produit et l'attacher à la commande avec la quantité
            foreach ($productsArray as $product) {
            // Ajouter la relation many-to-many entre la commande et le produit avec la quantité
                $order->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'total_per_product' => $product['total']]);
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
