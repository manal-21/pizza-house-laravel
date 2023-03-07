@extends('layouts.layout')

@section('content')
<div class="wrapper create-pizza">
    <h1>Create a New Pizza</h1>
    <form action="/pizzas" method="POST">
        @csrf
        <label for="title">Pizza Title:</label>
        <input type="text" id="title" name="title">
        <label for="pizza">Choose Pizza:</label>
        <select name="type" id="type">
            @foreach($types as $row )
                <option value="{{ $row->id }}">{{ $row->type_title }}</option>
            @endforeach
        </select>
        <label for="price">Price : </label>
        <input type="text" id="price" name="price">
        <input type="submit" value="Add Pizza">
    </form>
</div>
@endsection