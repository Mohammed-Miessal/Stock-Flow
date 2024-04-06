<?php
namespace App\Interfaces;

interface ProductInterface
{
    public function index();

    public function store($data);

    public function show($id);

    public function update($data, $id);

    public function delete($id);
}