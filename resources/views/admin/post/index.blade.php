@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
    <div class="content content-wrapper">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bài viết</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Tên bài viết
                        </th>
                        <th style="width: 30%">
                            Nội dung
                        </th>
                        <th>
                            Ảnh
                        </th>
                        <th style="width: 8%" class="text-center">
                            Danh mục
                        </th>

                        <th style="width: 8%" class="text-center">
                            Trạng thái
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td>
                                {{$post->id}}
                            </td>
                            <td>
                                <a>
                                    {{$post->title}}
                                </a>
                                <br>
                                <small>
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline ">
                                    <li class="list-inline-item " >
                                        {{$post->content}}
                                    </li>

                                </ul>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    @foreach($imageP as $key=> $image)
                                    <li class="list-inline-item">
                                        <img src="{{ asset('storage/post_images/'.$image->image_path.'.jpg') }}" alt="" srcset="">
                                    </li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                <ul class="list-inline">
                                    @foreach($posts as $post)
                                            <li class="list-inline-item">
                                                {{$post->title}}
                                            </li>
                                    @endforeach
                                </ul>
                            </td>



                            <td class="project-state">
                                @if ($post->status == env('STATUS_ACTIVE'))
                                    <span class="badge badge-success">Hoạt động</span>
                                @else
                                    <span class="badge badge-danger">Chưa hoạt động</span>
                                @endif
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    Xem
                                </a>
{{--                                <a class="btn btn-info btn-sm" href="{{route('admin.category.edit',[$category->id])}}">--}}
{{--                                    <i class="fas fa-pencil-alt">--}}
{{--                                    </i>--}}
{{--                                    Sửa--}}
{{--                                </a>--}}

{{--                                <form method="POST" action="{{ route('admin.category.destroy', $category->id) }}"--}}
{{--                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa Category này?')" >--}}
{{--                                    @method('DELETE')--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                        <i class="fas fa-trash">--}}
{{--                                        </i>--}}
{{--                                        Xóa--}}
{{--                                    </button>--}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
