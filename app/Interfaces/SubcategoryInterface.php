<?php
namespace App\Interfaces;

interface SubcategoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function show($id);
}