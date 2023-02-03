<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Attribute;

class OrderController  extends Controller
{
    public function index () {
        $order = Order::find(2); 
        dump($order);
        dump($order->order_name);
        dd($order->price);
    }
}
