@extends('layouts.app')
@section('content')
<body>
<div class="container mt-5 d-flex justify-content-center">

    {{--        <h1> model : {{ $car->model }} </h1>--}}
    {{--        <h1> color : {{ $car->color }} </h1>--}}
    {{--        <h1> price : {{ $car->price }} </h1>--}}
    {{--        <img src="/img/{{$car->image}}" alt="asht">--}}
@if(isset($cars))
    @foreach($cars as $car)
        <div class="card m-5 text-primary" style="width: 18rem;">
            <img src="/img/{{$car->image}}" alt="asht">
            <div class="card-body">
                <h1 class="card-title">model : {{ $car->model }} </h1>
                <h2> color : {{ $car->color }} </h2>
                <h3> color : {{ $car->price }} </h3>
                <a href="/cars/{{ $car->id }}" class="my-3 btn btn-primary">car page</a>
            </div>
        </div>

    @endforeach

    {{-- Pagination --}}

</div>

<div class="d-flex justify-content-center bg-white tea">
    {!! $cars->links() !!}
</div>
<div class="text-center">
    <a href="/cards">
        <h1 class="text-center zz btn btn-primary p-3 mx-3 btn-style">Paginated</h1>
    </a>
</div>


@endif

</body>

@endsection
