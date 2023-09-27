@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Products</h2>
@if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
@endif
<div class="d-flex justify-content-center">
    <a href="{{route('admin.products.create')}}" class="my-3 btn btn-primary text-decoration-none actions">
        <span>Add a new product</span>
    </a>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td class="text-center"><img height=70 src="{{$product->image}}" alt=""></td>
      <td>{{$product->name}}</td>
      <td>€{{$product->price}}</td>
      <td>{{$product->description}}</td>
      <td class="d-flex flex-column justify-content-center align-items-center">
                    <a href="{{route('admin.products.show', $product)}}"
                        class="btn btn-primary text-decoration-none actions">
                        <span>View</span>
                    </a>
                    <a href="{{route('admin.products.edit', $product)}}"
                        class="btn btn-warning text-decoration-none actions">
                        <span>Edit</span>
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger actions" data-bs-toggle="modal"
                        data-bs-target="#modal{{$product->slug}}">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modal{{$product->slug}}" tabindex="-1"
                        aria-labelledby="modalTitle-{{$product->slug}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hey bro!</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are u sure u want to delete
                                    <strong>{{$product->name}}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('admin.products.destroy', $product->slug)}}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal -->
                </td>
    </tr>
    @empty
    <tr>No products registered</tr>
    @endforelse
  </tbody>
</table>
</div>
@endsection
