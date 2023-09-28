@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Edit</h2>
   @include('partials.validation_error')
    <form action="{{route('admin.products.update', $product->slug)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label @error('description') is-invalid @enderror">New Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{old('name', $product->name)}}" placeholder="New Product name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label @error('price') is-invalid @enderror">New Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price', $product->price)}}" aria-describedby="price" placeholder="New Product price">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">New Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description', $product->description)}}"  aria-describedby="description" placeholder=" New Product description" rows="4">
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label @error('image') is-invalid @enderror">New Image URL</label>
          <input type="text" name="image" id="image" class="form-control" placeholder="New Image URL" value="{{old('image', $product->image)}}" aria-describedby="image">
        </div>
        <div id="buttons" class="d-flex justify-content-center gap-3">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
@endsection