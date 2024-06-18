@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Blog</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-success">Thêm blog</a>
    </div>
    <hr />
    </div>
    <table class="table table-light">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($blogs->count() > 0)
                @foreach ($blogs as $item)
                    <tr>
                        <td class="align-middle">{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle"><img src="{{ asset($item->image)}}" width="150" height="100" alt=""></td>
                        <td class="align-middle">{{ $item->title }}</td>
                        <td class="align-middle">{!! nl2br(e($item->content)) !!}</td>
                        <td class="align-middle">{{ $item->status == 0 ? 'Ẩn' : 'Hiển thị' }}</td>
                        <td class="align-middle">
                            <div class="d-flex">
                                <a href="{{ route('blog.edit', $item->id) }}" type="button" class="btn btn-warning me-2"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('blog.destroy', $item->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Bạn có muốn xóa không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Không có blog nào!</td>
                </tr>
            @endif
        </tbody>
        <div>
            {!! $blogs->onEachSide(1)->links('pagination::bootstrap-4') !!}
        </div>
    </table>
   
@endsection
