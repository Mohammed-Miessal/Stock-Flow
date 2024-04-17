<?php 

namespace App\Services;

use App\Interfaces\SupplierInterface;

class SupplierService implements SupplierInterface
{
    protected $supplier;

    public function __construct(SupplierInterface $supplier)
    {
        $this->supplier = $supplier;
    }

    public function index()
    {
        $suppliers = $this->supplier->index();
        return $suppliers;
    }

    public function show($id)
    {
        $supplier = $this->supplier->show($id);
        return $supplier;
    }

    public function store($data)
    {
        $supplier = $this->supplier->store($data);
        return $supplier;
    }

    public function update($id, $data)
    {
        $supplier = $this->supplier->update($id, $data);
        return $supplier;
    }

    public function delete($id)
    {
        $supplier = $this->supplier->delete($id);
        return $supplier;
    }
}
