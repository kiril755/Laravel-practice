<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Attribute;

class OrderController  extends Controller
{
    public function index () {
        $orders = Order::all();

        return view('order.index', compact('orders'));
    }

    public function create () {
        return view('order.create');
    }

    public function store () {
        $data = request()->validate([
            'order_name' => 'string',
            'price' => 'integer',
            'count' => 'integer',
        ]);
        Order::create($data);
        return redirect()->route('order.index');
    }
    public function show (Order $order) {
        return view('order.show', compact('order'));
    }
    public function edit (Order $order) {
        return view('order.edit', compact('order'));
    }
    public function update (Order $order) {
        $data = request()->validate([
            'order_name' => 'string',
            'price' => 'integer',
            'count' => 'integer',
        ]);
        $order->update($data);

        return redirect()->route('order.show', $order->id);
    }
    public function destroy (Order $order) {
        $order->delete();
        return redirect()->route('order.index');
    }
}
