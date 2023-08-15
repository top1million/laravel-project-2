@extends('layouts.app')
@section('content')

    <div class="container my-auto main">


        <div class="text-center  ">
            {{--        print sesion error--}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if ($cars->count() != 0)

                <div id="carouselExample" class="owl-carousel">
                    @foreach ($cars as $car)

                        <div class="item d-flex flex-column" data-slide-index="">
                            <a class="test" href="/cars/{{ $car->id }}">
                                <img class="img-fluid" src="/img/{{$car->image}}" alt="test">
                            </a>
                            <a class="btn btn-danger p-3 btn-style"> buy now</a>
                        </div>


                    @endforeach

                </div>

            @endif
{{--if user is admin and logged in--}}
            @if(Auth::user() && Auth::user()->role == 'admin')
            <a href="/cars/create">
                <h1 class="text-center zz btn btn-dark p-3 btn-style">add a car</h1>
            </a>
            @endif
            <a href="/cards">
                <h1 class="text-center zz btn btn-primary p-3 mx-3 btn-style">Paginated</h1>
            </a>
        </div>


    </div>

@endsection
