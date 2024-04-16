<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Invoice;
use App\Services\InvoiceService;
use App\Services\ProductService;
use App\Services\CustomerService;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{

    protected $invoice ;
    protected $customer;
    protected $product;

    public function __construct(InvoiceService $invoice , CustomerService $customer , ProductService $product)
    {
        $this->invoice = $invoice;
        $this->customer = $customer;
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = $this->invoice->index();
        return view('chapters.Invoice.read', compact('invoices'));
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

        return view('chapters.Invoice.create' , compact('customers' , 'products' , 'productPrices' , 'productNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $data = $request->validated();

        // Générer un UUID
        $uuid = Uuid::uuid4()->toString();
        
        // Ajouter l'UUID aux données à insérer
        $data['invoice_number'] = $uuid;

        $invoice = $this->invoice->store($data);

           // Récupérer la chaîne JSON représentant les produits depuis la requête
        $productsJson = $request->input('products');
        
           // Décoder la chaîne JSON en un tableau associatif
        $productsArray = json_decode($productsJson, true);

            // Parcourir chaque produit et l'attacher à la commande avec la quantité
        foreach ($productsArray as $product) {
            // Ajouter la relation many-to-many entre la commande et le produit avec la quantité
            $invoice->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'total_per_product' => $product['total']]);
        }

        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice = $this->invoice->show($invoice->id);
        // dd($invoice->products);
        return view('chapters.Invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $invoice = $this->invoice->show($invoice->id);
        $customers = $this->customer->index();
        $products = $this->product->index();
        // Préparez les prix des produits dans un tableau associatif
        $productPrices = [];
        $productNames = [];
        foreach ($products as $product) {
            $productPrices[$product->id] = $product->price;
            $productNames[$product->id] = $product->name;      
        }
        return view('chapters.Invoice.edit', compact('invoice' , 'customers' , 'products' , 'productPrices' , 'productNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $data = $request->validated();

        // Générer un UUID
        $uuid = Uuid::uuid4()->toString();
    
        // Ajouter l'UUID aux données à insérer
        $data['invoice_number'] = $uuid;
    
        // Mettre à jour la commande avec les données validées
        $invoice = $this->invoice->update($invoice->id , $data );

        // Récupérer la chaîne JSON représentant les produits depuis la requête
        $productsJson = $request->input('products');

        // Décoder la chaîne JSON en un tableau associatif
        $productsArray = json_decode($productsJson, true);

        // Supprimer tous les produits de la commande
        $invoice->products()->detach();

        // Parcourir chaque produit et l'attacher à la commande avec la quantité
        foreach ($productsArray as $product) {
            // Ajouter la relation many-to-many entre la commande et le produit avec la quantité
            $invoice->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'total_per_product' => $product['total']]);
        }

        return redirect()->route('invoice.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice = $this->invoice->delete($invoice->id);
        return redirect()->route('invoice.index');
    }

    
}
