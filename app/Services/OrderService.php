<?php

namespace App\Services;

use App\Interfaces\OrderInterface;

class OrderService
{
    protected $order;

    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->index();
        return $orders ;
    }

    public function show($id)
    {
        $order =  $this->order->show($id);
        return $order ;
    }

    public function store($data)
    {
        $order =  $this->order->store($data);
        return $order ;

    }

    public function update($id, $data)
    {
        $order = $this->order->update($id, $data);
        return $order ;

    }

    public function destroy($id)
    {
        $order = $this->order->delete($id);
        return $order ;

    }

}
