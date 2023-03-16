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
                            <a style="color: white; @if($color->color == "Green") background:green; @elseif($color->color == "Pink") background: deeppink; @elseif($color->color == "Black") background: black; @endif" class="product-model" href="{{route('product', $color->id)}}">{{$color->color}}</a>
                        @endforeach
                </div>
                </div>
                @endif

                    @if(count($storage_gb) > 0)
                    <div>
                        <p style="margin-bottom: 10px">Модель</p>
                        <div style="display: flex; gap: 5px;">
                        @foreach($storage_gb as $storage_gbone)
                            <a class="product-model" href="{{route('product', $storage_gbone->id)}}">{{$storage_gbone->storage_gb}}</a>
                        @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    @endisset
</div>
@endsection
