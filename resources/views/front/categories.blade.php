@extends('front.layouts.layout')
@section('title','Auto :: Home')
@section('content')

        <div style="margin-bottom: 100px;" class="container">
            <ol class="breadcrumb breadco" style="margin-top: 40px;">
                <li><a href="{{route('home')}}">Bosh sahifa</a></li>
                <li class="active">Kategoriyalar</li>
            </ol>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-3">
                    <ul>
                        @foreach($category as $k=>$value)
                         <li><a href="{{route('category.single',['id'=>$k])}}">{{$value}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach

            </div>
        </div>
@endsection

