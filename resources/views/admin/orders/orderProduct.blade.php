@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sotilgan tovar savdo № {{$product->order->id}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">orderProduct Edit</li>
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
                            <h3 class="card-title">Tovar: "{{ $product->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('order-products.update', ['order_product' => $product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group" style="width: 40%">
                                    <label for="qty">Soni</label>
                                    <input type="number" min="0" name="qty"
                                           class="form-control @error('qty') is-invalid @enderror" id="qty"
                                           value="{{$product->qty}}">
                                </div>
                                <div class="form-group" style="width: 40%">
                                    <label for="price">Narxi</label>
                                    <input type="number" min="0" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           value="{{$product->price}}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

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

