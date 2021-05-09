@extends('front.layouts.layout')
@section('title','Auto :: Home')
@section('content')
    <div class="services">
        <div class="container">
            <ol class="breadcrumb breadco">
                <li><a href="{{route('home')}}">Bosh sahifa</a></li>
                <li class="active" >Savat</li>
            </ol>
            <div class="services-overview">
                <h3 style="text-align: left">Savat</h3>
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
@if(isset($cart))
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Rasm</th>
                            <th>Tovar</th>
                            <th>Soni</th>
                            <th>Narxi</th>
                            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $key=>$value)
                        <tr>
                            <td><img src="{{'/uploads/'.$value['img']}}" style="width: 50px" alt="{{$value['name']}}"></td>
                            <td style="color: blue">{{$value['name']}}</td>
                            <td style="color: black">{{$value['qty']}}</td>
                            <td style="color: black">{{$value['price']}}</td>
                            <td><a href="{{route('cart.delete', ['id'=>$key])}}"><span data-id="3" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="color: black">Итог:</td>
                            <td></td>
                            <td></td>
                            <td class="cart-sum" style="color: black">{{session('cartSum')}}</td>
                            <td></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                    <form style="width: 500px;" method="get" action="{{route('save.order')}}" role="form" data-toggle="validator" novalidate="true">
                        <div class="form-group">
                            <label for="address">Qoshimcha</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Sotish</button>
                    </form>

                @else
    <h3>Savat bo`sh...</h3>
                @endif
            </div>
        </div>
    </div>
@endsection


