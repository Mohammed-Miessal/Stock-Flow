<?php 
namespace App\Repositories;


use App\Models\Customer;
use App\Interfaces\CustomerInterface;


class CustomerRepository implements CustomerInterface
{
    public function index()
    {
        return Customer::all();
    }
    
    public function show($id)
    {
        return Customer::find($id);
    }

    public function store($data)
    {
        return Customer::create($data);
    }

    public function update($id, $data)
    {
        $customer = Customer::find($id);
        $customer->update($data);
        return $customer;
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return $customer;
    }
}
