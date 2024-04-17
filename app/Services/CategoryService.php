<?php 

namespace App\Services;

use App\Interfaces\CategoryInterface;

class CategoryService
{
    protected $category;

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->index();
        return $categories;
    }

    public function show($id)
    {
        $category = $this->category->show($id);
        return $category ;
    }

    public function store($data)
    {
        $category = $this->category->store($data);
        return $category ;
    }

    public function update($id,$data)
    {
        $category = $this->category->update($id,$data);
        return $category ;
    }

    public function destroy($id)
    {
        $category = $this->category->delete($id);
        return $category ;
    }
}
