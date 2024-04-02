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
        return $this->subcategory->index();
    }

    public function show($id)
    {
        return $this->subcategory->show($id);
    }

    public function store($data)
    {
        return $this->subcategory->store($data);
    }

    public function update($id, $data)
    {
        return $this->subcategory->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->subcategory->delete($id);
    }
}