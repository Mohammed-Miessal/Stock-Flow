<?php
namespace App\Repositories;


use App\Models\Subcategory;
use App\Interfaces\SubcategoryInterface;

class SubcategoryRepository implements SubcategoryInterface
{
    public function index()
    {
        return Subcategory::all();
    }

    public function store(array $data)
    {
        return Subcategory::create($data);
    }

    public function update(array $data, $id)
    {
        $subcategory = Subcategory::find($id);
        return $subcategory->update($data);
    }

    public function delete($id)
    {
        return Subcategory::destroy($id);
    }

    public function show($id)
    {
        return Subcategory::find($id);
    }
}