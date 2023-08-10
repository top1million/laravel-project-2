@extends('layouts.app')
@section('content')


<div class="container p-5 my-auto">


    <div class="text-center text-white ">
        <h1 class="mssg">{{ session('mssg') }} </h1>
        <img class="mx-auto " src="/img/test.jpg" alt="">
        @foreach ($cars as $car)
        <a href="/cars/{{ $car->id }}"><h1 class="text-center"> {{ $car->model }} - {{ $car->color }} - {{ $car->price }}</h1></a>
        @endforeach
        <br>
        <br>
        <br>
        <a href="/cars/create"><h1 class="text-center btn btn-primary">add a car</h1></a>
    </div>


</div>

@endsection
