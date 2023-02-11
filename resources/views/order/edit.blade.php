@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('order.update', $order->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="order_name">Item name</label>
                <input type="text" name="order_name" class="form-control" id="order_name" placeholder="Item name" value="{{ $order->order_name }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="price" value="{{ $order->price }}">
            </div>
            <div class="form-group">
                <label for="count">Count</label>
                <input type="number" name="count" class="form-control" id="count" placeholder="count" value="{{ $order->count }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection