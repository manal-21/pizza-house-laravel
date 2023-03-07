@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Orders List
        </div>

        @foreach ($orders as $o)
        <div>
            {{ $loop->index }} - {{ $o->title }} - {{ $o->name }} - {{ $o->base }}
        </div>
        @endforeach
        <br>
    </div>
</div>
@endsection