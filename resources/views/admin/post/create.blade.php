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
                        <h3 class="card-title">Tạo bài viết </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action ="{{route('admin.post.store')}}"  enctype='multipart/form-data' id="image-upload" class="dropzone">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Nội dung</label>
                                <textarea id="inputDescription" name="content" class="form-control" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Danh mục</label>
                                <select id="inputStatus" class="form-control custom-select" name="categories_id">
                                    @foreach($categories as $key => $category)
                                        <option value="{{$category->id}}" {{$category->id == old('categories_id') ? 'selected' : ''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-4">

                                <div class="form-check">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" checked>
                                    <label class="form-check-label">Hiển thị</label>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group row">
                                    <div class="col">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name= "images[]" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- /.card-body -->


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
