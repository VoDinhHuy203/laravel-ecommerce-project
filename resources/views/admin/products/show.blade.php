@extends('admin.layouts.app')
@section('title', 'Show Product')
@section('content')
    <div class="card">
        <h1>Show Product</h1>

        <div>

                <div class="row">
                    <div class=" input-group-static col-5 mb-4">
                        <label>Image</label>
                    </div>
                    <div class="col-5">
                        <img src="{{ $product->images ? asset('upload/' . $product->images->first()->url) : 'upload/ao-default.webp' }}" width="100px" height="100px" id="show-image" alt="">
                    </div>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Name: {{ $product->name }}</label>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Price: {{ $product->price }}</label>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Sale: {{ $product->sale }}</label>
                </div>



                <div class="form-group">
                    <label>Description</label>
                    <div class="row w-100 h-100">
                        {{ $product->description }}
                    </div>
                </div>

                <div>
                    <label>Size</label>
                    @if($product->details->count() > 0)
                        @foreach ($product->details as $detail)
                            <p>Size: {{ $detail->size }} - Quantity: {{ $detail->quantity }}</p>
                        @endforeach
                    @else 
                        <p>Sản phẩm chưa nhập size</p>
                    @endif
                </div>

                <div>
                    <label for="">Category</label>
                    @foreach ($product->categories as $category)
                        <p>{{ $category->name }}</p>
                    @endforeach
                </div>
                <!-- Modal -->
                
        </div>
        
    </div>
    </div>
@endsection