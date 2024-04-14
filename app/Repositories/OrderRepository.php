<?php 
namespace App\Repositories;


use App\Models\Order;
use App\Interfaces\OrderInterface;

class OrderRepository implements OrderInterface
{

    public function index(){
        return Order::all();
    }


    public function show($id){
        return Order::find($id);
    }

    public function store($data){
        return Order::create($data);
    }

    public function update($id, $data){
        $order = Order::find($id);
        $order->update($data);
        return $order;
    }

    public function delete($id){
        $order = Order::find($id);
        $order->delete();
        return $order;
    }


}
