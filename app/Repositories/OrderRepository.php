<?php 

namespace App\Repositories;

use App\Models\Order;
use App\Interfaces\OrderInterface;


class OrderRepository implements OrderInterface
{

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index(){
        $orders = $this->order::all();
        return $orders;
    }


    public function show($id){
        $order = $this->order::find($id);
        return $order;
    }

    public function store($data){
        $order = $this->order::create($data);
        return $order;
    }

    public function update($id, $data){
        $order = $this->order::find($id);
        $order->update($data);
        return $order;
    }

    public function delete($id){
        $order = $this->order::find($id);
        $order->delete();
        return $order;
    }


}
