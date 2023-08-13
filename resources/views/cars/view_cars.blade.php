@extends('layouts.app')
@section('content')


<div class="container my-auto main">


    <div class="text-center text-white ">
        <h1 class="mssg">{{ session('mssg') }} </h1>


        <div id="carouselExample" class="owl-carousel">
            @foreach ($cars as $car)

            <div class="item" data-slide-index="">
                <a class="test" href="/cars/{{ $car->id }}">
                    <img class="img-fluid" src="/img/{{$car->image}}">
                </a>
            </div>

            @endforeach

            @if ($is_empty)
            <h1>you have no purchased cars</h1>
            @endif
        </div>


    </div>


</div>

@endsection
