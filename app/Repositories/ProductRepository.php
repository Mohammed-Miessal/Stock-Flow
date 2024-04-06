<?php
namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    public function index()
    {
        return Product::all();
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update($data, $id)
    {
        return Product::find($id)->update($data);
    }

    public function delete($id)
    {
        return Product::find($id)->delete();
    }
}