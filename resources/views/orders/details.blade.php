@extends('layouts.layout')

@section('content')
<div class="wrapper order-details">
    
    <h1> Ordered By : {{ $order->name }}</h1>
    <p class="type">Ordered Pizza : {{ $order->title }}</p>
    <p class="price">Pizza Base : {{ $order->base }}</p>
    <p class="toppings">Extra Toppings : </p>
    <ul>
        @foreach ($order->toppings as $t)
            <li>{{ $t }}</li>
        @endforeach
    </ul>
    <form action="/orders/{{ $order->id }}" method="POST">
        @csrf
        @method('DELETE') <!-- browsers do not always understand the delete method of the form so we put the method post and over
        wrote it to be a delete method using blade syntax to fake browsers -->
        <button>Delete Order</button>
    </form>
</div>
@endsection