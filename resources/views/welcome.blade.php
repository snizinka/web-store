@extends('templates.layout')

@section('content')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
            <h1 style="text-align: center; margin-bottom: 80px;">{{$category->name}}</h1>
            <div class="product-container" style="display: flex; gap: 10px; flex-wrap: wrap; width: 90vw; justify-content: center">
                @isset($category)
                    @foreach($category->products as $product)
                       <div class="product">
                           <img src="{{asset('storage/images/'.$product->thumbnail)}}" alt="{{$product->category->name." ".$product->model." ".$product->storage_gb."GB ".$product->color}}">
                           <h2>{{$product->category->name}} {{$product->model}} {{$product->storage_gb}}GB {{$product->color}}</h2>
                           <p class="price">{{$product->price}} ₴</p>
                           <a style="padding: 3px 10px; border: solid crimson 2px;" href="{{route('product', $product->id)}}">Details</a>
                       </div>
                    @endforeach
                @endisset
            </div>

        </div>
@endsection
