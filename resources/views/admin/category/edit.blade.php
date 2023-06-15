@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
    <div class="content content-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- ---- -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- left column -->
                    <div>
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Sửa danh mục </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST"  action ="{{route('admin.category.update',[$category->id])}}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                        <input type="text" name="title" value= "{{$category->title}}" class="form-control" placeholder="Nhập danh mục">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả</label>
                                        <input type="text" name="describe" class="form-control"  value="{{$category->describe}}" placeholder="Nhập mô tả">
                                    </div>

                                    <div class="form-group">
                                        @if($category->status==1)
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="checkbox" value="1" checked>
                                            <label class="form-check-label">Hiển thị</label>
                                        </div>
                                        @else
                                            <div class="form-check">
                                                <input class="form-check-input" name="status" type="checkbox" value="0">
                                                <label class="form-check-label">Hiển thị</label>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        <!-- general form elements -->




                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
@endsection
