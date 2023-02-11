@extends('layouts.main')
@section('content')
    <div>
        <div> {{  $order->id }}. {{ $order->order_name }} </div>
        <div> {{ $order->price }} </div>
    </div>
    <div>
        <a href="{{ route('order.edit', $order->id) }}">edit</a>
    </div>
    <div>
        <form action="{{ route('order.destroy', $order->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="delete">
        </form>
    </div>
    <div>
        <a href="{{ route('order.index') }}">Back</a>
    </div>
@endsection