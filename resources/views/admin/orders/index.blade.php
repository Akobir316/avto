@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sotilgan Tovarlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Savdo ro`yxati</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @if (count($orders))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">ID</th>
                                            <th>Sotgan kishi</th>
                                            <th>Umumiy summa</th>
                                            <th>Sotilgan sana</th>
                                            <th>O`zgartirilgan sana</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            @php
                                            $price=0;
                                            @endphp
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>
                                                    @php
                                                        foreach ($products = $order->orderProducts()->get() as $product) { $price+=$product->price;}
                                                    @endphp
                                                    {{$price}}
                                                </td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->updated_at}}</td>
                                                <td>
                                                    <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                    {{--<form
                                                        action="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('O`chirishni tasdiqlash')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Sotilganlar tovarlar yoq...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $orders->links() }}

                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


