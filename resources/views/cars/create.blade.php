@extends('layouts.app')
@section('content')
<div class="wrapper create-car container text-center">
    <h1>create a new car</h1>

    <form action="/cars" method="post">
        @csrf
        <div class="container my-5"> <label for="name">car model</label>
            <input type="text" id="name" name="model">
        </div>
        <div class="container my-5"><label for="type">choose color of car</label>
            <select name="color" id="type">
                <option value="red">red</option>
                <option value="green">green</option>
                <option value="yellow">yellow</option>
                <option value="blue">blue</option>
            </select>
        </div>
        <div class="container my-5"><label for="base">car price</label>
            <input type="text" placeholder="price">
        </div>
        <input type="submit" value="create car" class="mx-auto">
    </form>
</div>
@endsection
