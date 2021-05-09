@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Savdo detallari</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders Edit</li>
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
                            <h3 class="card-title">Savdo № "{{ $order->id }}"</h3>
                        </div>
                        <!-- /.card-header -->


                            <div class="card-body">
                                <form role="form" method="post" action="{{ route('orders.update', ['order' => $order->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                        <tr>
                                            <td>Savdo raqami</td>
                                            <td>{{$order->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Savdo sanasi</td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Savdoga o`zgartirish kiritilgan vaqt</td>
                                            <td>{{$order->updated_at}}</td>
                                        </tr>
                                            <td>Summa</td>
                                            <td>{{$price}}</td>
                                        </tr>
                                        <tr>
                                            <td>Sotuvchi</td>
                                            <td>{{$order->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Qo`shimcha ma`lumot</td>
                                            <td>{{$order->note}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                        <button type="submit" class="btn btn-primary">Сохранить</button>

                                </form>
                                <h3>Sotilgan tovarlar</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tovar nomi</th>
                                            <th>Soni</th>
                                            <th>Narxi</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->qty}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                <a href="{{ route('order-products.edit', ['order_product' => $product->id]) }}"
                                                   class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <form action="{{ route('order-products.destroy', ['order_product' => $product->id]) }}"
                                                    method="post" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('O`chirishni tasdiqlash')">
                                                        <i
                                                            class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr class="active">
                                            <td colspan="2">
                                                <b>Итог:</b>
                                            </td>
                                            <td><b>{{$qty}}</b></td>
                                            <td><b>{{$price}}</b></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->




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

