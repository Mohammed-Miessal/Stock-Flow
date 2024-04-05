<?php
namespace App\Interfaces;

use App\Models\Tax;

interface TaxInterface
{
    public function index();

    public function show(Tax $tax);

    public function store(array $data);

    public function update(array $data, Tax $tax);

    public function delete(Tax $tax);
}
