@extends('layouts.app')
@section('content')


<div class="container p-5 my-auto main">


    <div class="text-center text-white ">
        <h1 class="mssg">{{ session('mssg') }} </h1>
        @if ($cars->count() != 0)
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($cars as $car)

                <div class="carousel-item active">
                    <a class="test" href="/cars/{{ $car->id }}">
                        <img class="img-fluid" src="/img/{{$car->image}}" >
                    </a>
                </div>

                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        @endif


        <a href="/cars/create">
            <h1 class="text-center btn btn-dark p-3">add a car</h1>
        </a>
    </div>


</div>

@endsection