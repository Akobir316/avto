@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tovarni o`zgartirish</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
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
                            <h3 class="card-title">Tovar "{{ $product->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Nomi</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $product->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="qty">Soni</label>
                                    <input type="number" min="0" name="qty"
                                           class="form-control @error('qty') is-invalid @enderror" id="qty"
                                           value="{{$product->qty}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Narxi</label>
                                    <input type="number" min="0" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           value="{{$product->price}}">
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Kategoriya</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                        @foreach($categories as $k => $v)
                                            <option value="{{ $k }}" @if($k == $product->category_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="auto_categories">Avto kategoriyalar</label>
                                    <select name="auto_categories[]" id="auto_categories" class="select2" multiple="multiple"
                                            data-placeholder="Выбор тегов" style="width: 100%;">
                                        @foreach($auto_categories as $k => $v)
                                            <option value="{{ $k }}" @if(in_array($k, $product->auto_categories->pluck('id')->all())) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Rasm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="img" id="img"
                                                   class="custom-file-input">
                                            <label class="custom-file-label" for="img">Rasm yuklash</label>
                                        </div>
                                    </div>
                                    <div><img src="{{ $product->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
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
