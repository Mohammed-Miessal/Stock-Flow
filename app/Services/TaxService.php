<?php

namespace App\Services;

use App\Interfaces\TaxInterface;

class TaxService implements TaxInterface
{
    protected $tax;
    public function __construct(TaxInterface $tax)
    {
        $this->tax = $tax;
    }


    public function index()
    {
    $taxes = $this->tax->index();
    return $taxes;
    }

    public function show($id)
    {
        $tax = $this->tax->show($id);
        return $tax;
    }

    public function store($data)
    {
        $tax = $this->tax->store($data);
        return $tax;
    }

    public function update($id,$data)
    {
        $tax = $this->tax->update($id,$data);
        return $tax;
    }

    public function delete($id)
    {
        $tax = $this->tax->delete($id);
        return $tax;
    }
}
