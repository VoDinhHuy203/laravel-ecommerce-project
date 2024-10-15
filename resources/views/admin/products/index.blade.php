@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
@section('page', 'Products')
<div class="card">

  @if (session('message'))
    <h2 class="text-primary">{{ session('message') }}</h2>
  @endif
  
  <h1>Product List</h1>

  <div>
    <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
  </div>
  <div> 
    <table class="table table-hover">
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Action</th>
      </tr>

      @foreach ($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td><img src="{{ $product->images->count() > 0 ? asset('upload/' . $product->images->first()->url) : 'upload/ao-default.webp' }}" width="50px" height="50px"  alt=""></td>
          <td>{{$product->name}}</td>
          <td>${{$product->price}}</td>
          <td>{{$product->sale}}</td>
          <td>
            <a href="{{route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{route('products.show', $product->id) }}" class="btn btn-info">Show</a>
            <form action="{{route('products.destroy', $product->id) }}" id="form-delete{{ $product->id }}" method="post">
              @csrf
              @method('DELETE')
            </form>
            <button class="btn btn-delete btn-danger" type="submit" data-id="{{$product->id}}">Delete</button>
          </td>
        </tr>
      @endforeach

    </table>
    {{ $products->links() }}
  </div>
</div>
@endsection