<?php 

namespace App\Services;

use App\Interfaces\SubcategoryInterface;

class SubcategoryService 
{
    protected $subcategory;

    public function __construct(SubcategoryInterface $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function index()
    {
        $subcategories = $this->subcategory->index();
        return $subcategories ;
    }

    public function show($id)
    {
        $subcategory = $this->subcategory->show($id);
        return $subcategory ;
    }

    public function store($data)
    {
        $subcategory = $this->subcategory->store($data);
        return $subcategory ;
    }

    public function update($id,$data)
    {
        $subcategory = $this->subcategory->update($id, $data);
        return $subcategory ;
    }

    public function destroy($id)
    {
        $subcategory = $this->subcategory->delete($id);
        return $subcategory ;
    }
}
