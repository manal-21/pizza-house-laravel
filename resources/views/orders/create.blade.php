@extends('layouts.layout')

@section('content')
<div class="wrapper create-pizza">
    <h1>Create a New Pizza</h1>
    <form action="/orders" method="POST">
        @csrf
        <label for="buyer">Your Name:</label>
        <input type="text" id="buyer" name="buyer">
        <label for="pizza">Choose Pizza:</label>
        <select name="pizza" id="pizza">
            @foreach($pizzas as $row )
                <option value="{{ $row->id }}">{{ $row->title }}</option>
            @endforeach
        </select>
        <label for="base">Choose Pizza Base:</label>
        <select name="base" id="base">
            <option value="cheesy crust">Cheesy Crust</option>
            <option value="garlic crust">Garlic Crust</option>
            <option value="thick">Thick</option>
        </select>
        <fieldset>
            <label>Extra Toppings : </label>
            <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms <br>
            <input type="checkbox" name="toppings[]" value="olives">Olives <br>
            <input type="checkbox" name="toppings[]" value="peppers">Peppers <br>
        </fieldset>
        <input type="submit" value="Order Pizza">
    </form>
</div>
@endsection