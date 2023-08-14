@extends('layouts.app')
@section('content')
<div class="wrapper create-car container text-center main text-white">
    <h1>create a new car</h1>

    <form action="/cars" method="post" enctype="multipart/form-data">
        @csrf
{{--        print error for model if found--}}
{{--        model.required--}}

        <div class="container my-5"> <label for="name">car model</label>
            <input type="text" id="name" name="model">
        </div>
        @if ($errors->has('model'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $errors->first('model') }}</li>
                </ul>
            </div>
        @endif
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
                <h4>Add image</h4>
            </label>
            <input type="file" name="images[]" class="myfrm form-control mx-auto" multiple>
        </div>
        <div class="container my-5"><label for="base">car price</label>
            <input name="price" type="text" placeholder="price">
        </div>
        @if ($errors->has('price'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $errors->first('price') }}</li>
                </ul>
            </div>
        @endif
        <input type="submit" value="create car" class="p-3 btn btn-primary mx-auto">
    </form>
</div>
@endsection
