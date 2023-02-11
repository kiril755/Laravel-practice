@extends('layouts.main')
@section('content')
    <div>
        <div><a class="btn btn-primary mb-3" href="{{ route('order.create') }}">Create order</a></div>
        <ul class="list-group">
            @foreach ($orders as $order)
            <li class="list-group-item">
                <a href="{{ route('order.show', $order->id) }}">
                    <h2>name {{ $order->order_name }}</h2>
                    <p>price {{ $order->price }}</p>
                    <p>count {{ $order->count }}</p>
                </a>
            </li>
            @endforeach
            </ul>
    </div>
@endsection