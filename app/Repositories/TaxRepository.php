<?php
namespace App\Repositories;

use App\Models\Tax;
use App\Interfaces\TaxInterface;

class TaxRepository implements TaxInterface
{
    public function index()
    {
        return Tax::all();
    }

    public function show(Tax $tax)
    {
        return Tax::find($tax);
    }

    public function store(array $data)
    {
        return Tax::create($data);
    }

    public function update(array $data, Tax $tax)
    {
        return $tax->update($data);
    }

    public function delete(Tax $tax)
    {
        return $tax->delete();
    }
}
