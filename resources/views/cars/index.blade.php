@extends('layouts.app')
@section('content')


<div class="container my-auto main">


    <div class="text-center text-white ">
        <h1 class="mssg">{{ session('mssg') }} </h1>
        @if ($cars->count() != 0)

        <div id="carouselExample" class="owl-carousel">
            @foreach ($cars as $car)

            <div class="item" data-slide-index="">
                <a class="test" href="/cars/{{ $car->id }}">
                    <img class="img-fluid" src="/img/{{$car->image}}">
                </a>
            </div>

            @endforeach

        </div>

        @endif


        <a href="/cars/create">
            <h1 class="text-center zz btn btn-dark p-3">add a car</h1>
        </a>
    </div>


</div>

@endsection