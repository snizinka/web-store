@extends('templates.layout')

@section('content')
<div class="container">
    @isset($product)
        <div class="product-alone">
            <img src="{{asset('storage/images/'.$product->thumbnail)}}" alt="{{$product->category->name." ".$product->model." ".$product->storage_gb."GB ".$product->color}}">
            <div class="details">
                <h2>{{$product->category->name." ".$product->model." ".$product->storage_gb."GB ".$product->color}}</h2>
                <p class="price">Ціна: {{$product->price}} ₴</p>


                @if(count($colors) > 0)
                    <div>
                        <p style="margin-bottom: 10px">Колір</p>
                        <div style="display: flex; gap: 5px;">
                        @foreach($colors as $color)
                            @if($color->amount > 0)
                                <a style="color: white; @if($color->color == "Green") background:green; @elseif($color->color == "Pink") background: deeppink; @elseif($color->color == "Black") background: black; @endif @if($color->color == $product->color) border: solid black 3px; @endif" class="product-model" href="{{route('product', $color->id)}}">{{$color->color}}</a>
                                @else
                                <p style="color: white; @if($color->color == "Green") background:green; @elseif($color->color == "Pink") background: deeppink; @elseif($color->color == "Black") background: black; @endif @if($color->color == $product->color) border: solid black 3px; @endif" class="product-model">{{$color->color}}</p>
                            @endif
                        @endforeach
                </div>
                </div>
                @endif

                    @if(count($storage_gb) > 0)
                    <div>
                        <p style="margin-bottom: 10px">Модель</p>
                        <div style="display: flex; gap: 5px;">
                        @foreach($storage_gb as $storage_gbone)
                            @if($storage_gbone->amount > 0)
                                <a class="product-model" style="@if($storage_gbone->storage_gb == $product->storage_gb) border: solid black 2px; @endif" href="{{route('product', $storage_gbone->id)}}">{{$storage_gbone->storage_gb}}</a>
                                @else
                                    <p class="product-model" style="background: #cbd5e0">{{$storage_gbone->storage_gb}}</p>
                            @endif
                        @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    @endisset
</div>
@endsection
