<?php 

namespace App\Repositories;

use App\Models\Customer;
use App\Interfaces\CustomerInterface;


class CustomerRepository implements CustomerInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customer = $this->customer::all();
        return $customer;
    }
    
    public function show($id)
    {
        $customer = $this->customer::find($id);
        return $customer;
    }

    public function store($data)
    {
        $customer = $this->customer::create($data);
        return $customer;
    }

    public function update($id, $data)
    {
        $customer = $this->customer::find($id);
        $customer->update($data);
        return $customer;
    }

    public function delete($id)
    {
        $customer = $this->customer::find($id);
        $customer->delete();
        return $customer;
    }
}
