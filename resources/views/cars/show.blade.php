@extends('layouts.app')
@section('content')


<div class="container p-5 my-auto">


    <div class="text-center text-primary ">
        <h1>{{ $car->model }} - {{ $car->color }} - {{ $car->price }}</h1>
        <!-- call image from public img -->
        <img src="/img/{{$car->image}}" alt="asht">
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger m-5">Complete Order</button>
        </form>
        <a href="/" class="btn btn-dark">Back</a>
    </div>

</div>


@endsection
