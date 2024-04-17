<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductInterface;


class ProductRepository implements ProductInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product::all();
        return $products;
    }

    public function store($data)
    {
        $product = $this->product::create($data);
        return $product;
    }

    public function show($id)
    {
        $product = $this->product::find($id);
        return $product;
    }

    public function update($id,$data)
    {
        $product = $this->product::find($id);
        $product->update($data);
        return $product;
    }
    
    public function delete($id)
    {
        $product = $this->product::find($id);
        $product->delete();
        return $product;
    }
}
