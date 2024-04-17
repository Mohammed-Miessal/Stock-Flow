<?php 

namespace App\Services;

use App\Interfaces\ProductInterface;

class ProductService implements ProductInterface
{
    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->index();
        return $products ;
    }

    public function store($data)
    {
        $product = $this->product->store($data);
        return $product ;
    }

    public function show($id)
    {
        $product =  $this->product->show($id);
        return $product ;
    }

    public function update($id,$data)
    {
        $product =  $this->product->update($id,$data);
        return $product ;
    }

    public function delete($id)
    {
        $product =  $this->product->delete($id);
        return $product ;
    }

}
