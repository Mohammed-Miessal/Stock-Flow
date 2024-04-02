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
        return $this->category->index();
    }

    public function show($id)
    {
        return $this->category->show($id);
    }

    public function store($data)
    {
        return $this->category->store($data);
    }

    public function update($id, $data)
    {
        return $this->category->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->category->delete($id);
    }
}

