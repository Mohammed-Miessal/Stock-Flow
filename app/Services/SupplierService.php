<?php 
namespace App\Services;

use App\Models\Supplier;
use App\Interfaces\SupplierInterface;

class SupplierService implements SupplierInterface
{
    protected $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function index()
    {
        return Supplier::all();
    }

    public function show($id)
    {
        return Supplier::find($id);
    }

    public function store($data)
    {
        return Supplier::create($data);
    }

    public function update($id, $data)
    {
        return Supplier::find($id)->update($data);
    }

    public function delete($id)
    {
        return Supplier::find($id)->delete();
    }
   
}
