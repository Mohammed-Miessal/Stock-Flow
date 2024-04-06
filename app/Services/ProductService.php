<?php 
namespace App\Services;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductService implements ProductInterface
{
  
    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->index();
    }

    public function store($data)
    {
        return $this->product->store($data);
    }

    public function show($id)
    {
        return $this->product->show($id);
    }

    public function update($data , $id)
    {
        return $this->product->update($data , $id);
    }

    public function delete($id)
    {
        return $this->product->delete($id);
    }

}
