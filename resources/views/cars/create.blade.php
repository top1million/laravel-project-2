@extends('layouts.app')
@section('content')
<div class="wrapper create-car container text-center main text-white">
    <h1>create a new car</h1>

    <form action="/cars" method="post" enctype="multipart/form-data">
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
                <option value="black">black</option>
                <option value="white">white</option>
            </select>
        </div>
        <div class="image">
            <label for="x">
                <h4 >Add image</h4>
            </label>
            <input  id="x" type="file" class="form-control mx-auto" required name="image">
        </div>
        <div class="container my-5"><label for="base">car price</label>
            <input name="price" type="text" placeholder="price">
        </div>
        <input type="submit" value="create car" class="p-3 btn btn-primary mx-auto">
    </form>
</div>
@endsection