<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Interfaces\SupplierInterface;


class SupplierRepository implements SupplierInterface
{
    protected $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function index()
    {
        $suppliers = $this->supplier::all();
        return $suppliers;

    }

    public function show($id)
    {
        $supplier = $this->supplier::find($id);
        return $supplier;
    }

    public function store($data)
    {
        $supplier = $this->supplier::create($data);
        return $supplier;
    }

    public function update($id,$data)
    {
        $supplier = $this->supplier::find($id);
        $supplier->update($data);
        return $supplier;
    }

    public function delete($id)
    {
        $supplier = $this->supplier::find($id);
        $supplier->delete();
        return $supplier;
    }
}
