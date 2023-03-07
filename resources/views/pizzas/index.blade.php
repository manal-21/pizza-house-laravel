@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Pizza List
        </div>

        @foreach ($pizzas as $p)
        <div>
            {{ $loop->index }} - {{ $p->title }} - {{ $p->type_title }} - {{ $p->price }}
        </div>
        @endforeach
        <br>
        <a href="{{route('createPizza')}}">Add a Pizza</a>
        <br>
        <br>
        <a href="{{route('createPizza')}}">Add a Pizza Type</a>

    </div>
</div>
@endsection