<?php

namespace App\Repositories;

use App\Models\Tax;
use App\Interfaces\TaxInterface;

class TaxRepository implements TaxInterface
{
    protected $tax;

    public function __construct(Tax $tax)
    {
        $this->tax = $tax;
    }

    public function index()
    {
        $taxes = $this->tax::all();
        return $taxes;
    }

    public function show($id)
    {
        $tax = $this->tax::find($id);
        return $tax;
    }

    public function store($data)
    {
        $tax = $this->tax::create($data);
        return $tax;
    }

    public function update($id,$data)
    {
        $tax = $this->tax::find($id);
        $tax->update($data);
        return $tax;
    }

    public function delete($id)
    {
        $tax = $this->tax::find($id);
        $tax->delete();
        return $tax;
    }
}
