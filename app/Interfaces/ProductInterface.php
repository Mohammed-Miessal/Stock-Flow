<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function index();
    public function store($data);
    public function show($id);
    public function update($id,$data);
    public function delete($id);
}
