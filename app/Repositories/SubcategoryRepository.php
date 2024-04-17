<?php

namespace App\Repositories;

use App\Models\Subcategory;
use App\Interfaces\SubcategoryInterface;


class SubcategoryRepository implements SubcategoryInterface
{
    protected $subcategory;

    public function __construct(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function index()
    {
        $subcategories = $this->subcategory::all();
        return $subcategories;
    }

    public function show($id)
    {
        $subcategory = $this->subcategory::find($id);
        return $subcategory;
    }

    public function store($data)
    {
        $subcategory = $this->subcategory::create($data);
        return $subcategory;
    }

    public function update($id,$data)
    {
        $subcategory = $this->subcategory::find($id);
        $subcategory->update($data);
        return $subcategory;
    }

    public function delete($id)
    {
        $subcategory = $this->subcategory::find($id);
        $subcategory->delete();
        return $subcategory;
    }
}
