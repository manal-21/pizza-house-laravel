@extends('layouts.layout')

@section('content')
<div class="wrapper pizza-details">
    
    <h1> Pizza Title : {{ $pizza->title }}</h1>
    <p class="type">Type : {{ $pizza->type_title }}</p>
    <p class="price">Price : {{ $pizza->price }}</p>
    <form action="/pizzas/{{ $pizza->id }}" method="POST">
        @csrf
        @method('DELETE') <!-- browsers do not always understand the delete method of the form so we put the method post and over
        wrote it to be a delete method using blade syntax to fake browsers -->
        <button>Delete Pizza</button>
    </form>
</div>
@endsection