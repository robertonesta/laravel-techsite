@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">{{$product->name}}</h2>
    <div class="card">
        <div class="card-body text-center">
            <div id="image_switch" class="d-flex justify-content-center">
                <img class="image w-50 card-img-top my-3 d-block" src="{{$product->image}}" alt="">
            </div>
        </div>
        <div class="card-footer bg-transparent py-3 text-center">
            <p class="fs-5">{{$product->description}}</p>
            <p><strong>Price: </strong>€{{$product->price}}</p>
        </div>
    </div>
@endsection