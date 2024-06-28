@extends('Admin.layouts.app')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Quản lý bình luận</h1>
    </div>
    <hr />
    </div>
    <table class="table table-light">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Khách Hàng</th>
                <th>Bình Luận</th>
                <th>Loại</th>
                <th>Liên Quan</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($comments->count() > 0)
                @foreach ($comments as $com)
                    <tr>
                        <td class="align-middle">
                            {{ ($comments->currentPage() - 1) * $comments->perPage() + $loop->index + 1 }}</td>
                        <td class="align-middle">{{ $com->customer->name }}</td>
                        <td class="align-middle">{{ $com->comment }}</td>
                        <td class="align-middle">{{ $com->type == 'product' ? 'Sản Phẩm' : 'Blog' }}</td>
                        <td class="align-middle">
                            @if ($com->type == 'product')
                                {{ $com->product->name }}
                            @elseif($com->type == 'blog')
                                {{ $com->blog->title }}
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <form action="{{ route('comment.destroy', $com->id) }}" method="POST" type="button"
                                class="btn btn-danger p-0"
                                onsubmit="return confirm('Bạn có muốn xóa bình luận này không?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Không có bình luận nào!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div>
        {!! $comments->onEachSide(1)->links('pagination::bootstrap-4') !!}
    </div>

@endsection
