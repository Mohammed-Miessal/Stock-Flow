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
        $category = $this->category::all();
        return $category;
    }

    public function show($id)
    {
        $category = $this->category::find($id);
        return $category;
    }

    public function store($data)
    {
        $category = $this->category::create($data);
        return $category;
    }

    public function update($id, $data)
    {
        $category = $this->category::find($id);
        $category->update($data);
    }

    public function delete($id)
    {
        $category = $this->category::find($id);
        $category->delete();
        return $category;
    }
}
