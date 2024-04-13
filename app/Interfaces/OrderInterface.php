<?php
namespace App\Interfaces;

interface OrderInterface
{
    public function index();
    public function show($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);
}