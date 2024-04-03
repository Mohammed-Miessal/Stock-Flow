<?php
namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function update($id, $data)
    {
        return Category::find($id)->update($data);
    }

    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}