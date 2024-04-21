<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\TaxService;
use App\Services\UnitService;
use App\Exports\ProductsExport;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\SupplierService;
use App\Services\SubcategoryService;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $unit;
    protected $tax;
    protected $supplier;
    protected $subcategory;

    public function __construct(ProductService $product , CategoryService $category, UnitService $unit, TaxService $tax , SupplierService $supplier, SubcategoryService $subcategory)
    {
        $this->product = $product;
        $this->category = $category;
        $this->unit = $unit;
        $this->tax = $tax;
        $this->supplier = $supplier;
        $this->subcategory = $subcategory;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->index();
        return view('chapters.Product.read', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = $this->product->index();
        $categories = $this->category->index();
        $units = $this->unit->index();
        $taxes = $this->tax->index();
        $suppliers = $this->supplier->index();
        $subcategories = $this->subcategory->index();
        return view('chapters.Product.create' , compact('products', 'categories', 'units', 'taxes' , 'suppliers', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $this->product->store($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product =  $this->product->show($product->id);
        return view('chapters.Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $products = $this->product->index();
        $categories = $this->category->index();
        $units = $this->unit->index();
        $taxes = $this->tax->index();
        $suppliers = $this->supplier->index();
        $subcategories = $this->subcategory->index();
        $product = $this->product->show($product->id);
        return view('chapters.Product.edit' , compact('product' , 'products', 'categories', 'units', 'taxes' , 'suppliers', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $this->product->update($product->id,$data );

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $this->product->delete($product->id);
        return redirect()->route('product.index');

    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportCSV() 
    {
        return Excel::download(new ProductsExport, 'products.csv');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = search($search);
        return response()->json($products);
    }

}
