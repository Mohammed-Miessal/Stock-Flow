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
        // return Category::all();
        $category = $this->category::all();
        return $category;
    }

    public function show($id)
    {
        // return Category::find($id);
        $category = $this->category::find($id);
        return $category;
    }

    public function store($data)
    {
        // return Category::create($data);
        $category = $this->category::create($data);
        return $category;
    }

    public function update($id, $data)
    {
        // return Category::find($id)->update($data);
        $category = $this->category::find($id);
        $category->update($data);
    }

    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}
