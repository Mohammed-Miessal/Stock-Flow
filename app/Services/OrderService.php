<?php
namespace App\Services;

use App\Models\Order;
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
        return $this->order->index();
    }

    public function show($id)
    {
        return $this->order->show($id);
    }

    public function store($data)
    {
        return $this->order->store($data);
    }

    public function update($id, $data)
    {
        return $this->order->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->order->delete($id);
    }

}