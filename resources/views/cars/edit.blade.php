@extends('layouts.app')
@section('content')
    <div class="wrapper create-car container text-center main text-white">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h1>edit car</h1>
        <div class="d-flex">
            @foreach($images as $img)
                <div class="d-flex flex-column mx-auto my-5">
                    <img src="/img/{{$img->image}}" alt="test" style="width: 100px; height: 100px; border-radius: 50px">
                    <button id="{{$img->id}}" class="btn btn-danger buttonCk">delete</button>
                </div>
            @endforeach
        </div>
        <form action="{{ route('imageDelete1')  }}" method="post">
            @csrf
            @method('POST')
            <input type="hidden" id="carIds" name="ids" value="">
            <button class="btn btn-primary p-3 buttonSave">Save</button>
        </form>

        <form action="/cars/{{$car->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            {{--        print error for name if found--}}
            {{--        name.required--}}
            {{--        print error for model if found--}}
            {{--        model.required--}}

            <div class="container my-5"><label for="name">car model</label>
                <input type="text" id="name" name="model" placeholder="{{$car->model}}">
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
                <input name="price" type="text" placeholder="{{$car->price}}">
            </div>
            @if ($errors->has('price'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $errors->first('price') }}</li>
                    </ul>
                </div>
            @endif
            <input type="submit" value="edit car" class="p-3 btn btn-primary mx-auto">
        </form>

    </div>

@endsection
