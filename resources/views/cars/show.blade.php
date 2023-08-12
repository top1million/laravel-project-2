@extends('layouts.app')
@section('content')


<div class="container my-auto">


    <div class="text-center text-primary ">
        <!-- call image from public img -->
        <h1>{{ $car->model }} - {{ $car->color }} - {{ $car->price }}</h1>
        <img src="/img/{{$car->image}}" alt="asht">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('DELETE')
            @if ($is_sold == false)
            <button class="btn btn-danger mx-5">Complete Order</button>
            @else
            <h1 class="text-danger d-inline">SOLD</h1>
            <a href="/" class="btn btn-dark d-inline mx-5">Back</a>
            @endif


        </form>
        
    </div>

</div>


@endsection
