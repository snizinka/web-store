@extends('templates.layout')

@section('content')
<div class="container">
    @isset($product)
        <div class="product">
            <img src="{{asset('storage/images/'.$product->thumbnail)}}" alt="{{$product->category->name." ".$product->model." ".$product->storage_gb."GB ".$product->color}}">
            <p>{{$product->category->name." ".$product->model." ".$product->storage_gb."GB ".$product->color}}</p>
            <p>{{$product->price}}</p>

            <div>
                @isset($colors)
                    @foreach($colors as $color)
                        <a href="{{route('product', $color->id)}}">{{$color->color}}</a>
                    @endforeach
                @endisset
            </div>
        </div>
    @endisset
</div>
@endsection
