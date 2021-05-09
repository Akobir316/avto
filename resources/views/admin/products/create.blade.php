@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tovarlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Create</li>
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
                            <h3 class="card-title">Yangi tovar qo`shish</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Nomi</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Nomi">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Soni</label>
                                    <input type="number" min="0" name="qty"
                                           class="form-control @error('qty') is-invalid @enderror" id="qty"
                                           placeholder="Soni">
                                </div>
                                <div class="form-group">
                                    <label for="price">Narxi</label>
                                    <input type="number" min="0" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           placeholder="Soni">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategoriya</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $k=>$v)
                                            <option value="{{$k}}"
                                                    @if(old('category_id')==$k)
                                                    selected
                                                @endif
                                            >{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="auto_categories">Avto kategoriya</label>
                                    <select name="auto_categories[]" id="auto_categories" class="select2" multiple="multiple"
                                            data-placeholder="Avto kategoriya tanlash" style="width: 100%;">
                                        @foreach($auto_categories as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Rasm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img" name="img">
                                            <label class="custom-file-label" for="img">Rasm yuklash</label>
                                        </div>

                                    </div>
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
