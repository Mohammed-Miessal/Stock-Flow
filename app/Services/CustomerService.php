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
        $customers = $this->customer->index();
        return $customers ;
    }

    public function show($id)
    {
        $customer = $this->customer->show($id);
        return $customer ;
    }

    public function store($data)
    {
        $customer = $this->customer->store($data);
        return $customer ;
    }

    public function update($id,$data)
    {
        $customer = $this->customer->update($id,$data);
        return $customer ;
    }

    public function delete($id)
    {
        $customer = $this->customer->delete($id);
        return $customer ;
    }
}
