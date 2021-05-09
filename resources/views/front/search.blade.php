@extends('front.layouts.layout')
@section('title','Auto :: Home')
@section('content')
    <div class="services">
        <div class="container">
            <ol class="breadcrumb breadco">
                <li><a href="{{route('home')}}">Bosh sahifa</a></li>
                <li>Qidirish</li>
                <li class="active">"{{$s}}" bo`yicha qidiruv natijasi</li>
            </ol>

            <div class="services-overview">
                <h3 style="text-align: left">Tovarlar</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="services-overview-grids">
                    @if($products->count())
                        @foreach($products as $product)
                            <form name="price" role="form" method="get" action="{{route('show.product',['id'=>$product->id])}}">
                                @csrf
                                <div class="col-md-4 services-overview-grid">
                                    <div class="services-overview-grd" style="border: 1px solid cornflowerblue; border-radius: 2px;">
                                        <img src="{{$product->getImage()}}" alt=" " class="img-responsive" style="height: 250px" >
                                        <div class="services-overview-gd">
                                            <h4>{{$product->title}}</h4>
                                            <h5 style="color: #9c9c9c; margin-bottom: 5px;">Qoldiq:{{$product->qty}}</h5>
                                            <div class="form-group">
                                                <label for="price" style="color: darkred;margin-bottom: 5px;">Iltimos tovar narxini kiriting!(so`mda)</label>
                                                <input type="text" min="0" name="price"
                                                       class="form-control @error('price') is-invalid @enderror" id="price"
                                                       placeholder="Narxi">
                                            </div>

                                            <ul class="social-icons">
                                                <li>Soni  <input type="number" size="4" style="width: 50px" value="1" name="qty" min="1" step="1"> | Savatchaga qo`shish</li>
                                                <li><button type="submit" style="background-color:transparent"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @else
                        <p>"{{$s}} bo`yicha tovar mavjud emas..."</p>
                    @endif

                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
    </div>
@endsection


