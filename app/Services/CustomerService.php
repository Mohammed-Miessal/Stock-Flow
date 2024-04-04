<?php 
namespace App\Services;

use App\Interfaces\CustomerInterface;

class CustomerService
{
    protected $customer;

    public function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        return $this->customer->index();
    }

    public function show($id)
    {
        return $this->customer->show($id);
    }

    public function store($data)
    {
        return $this->customer->store($data);
    }

    public function update($id, $data)
    {
        return $this->customer->update($id, $data);
    }

    public function delete($id)
    {
        return $this->customer->delete($id);
    }
}