<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Interfaces\SupplierInterface;


class SupplierRepository implements SupplierInterface
{
    public function index()
    {
        return Supplier::all();
    }

    public function find($id)
    {
        return Supplier::find($id);
    }

    public function create($data)
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