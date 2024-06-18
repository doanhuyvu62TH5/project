@extends('Admin.layouts.app')
@section('contents')
    <div>
        <div class="text-end">
            <a class="btn btn-success btn-sm" href="{{ route('blog.index') }}">Quay lại</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-7 bg-light" style="border-radius: 20px">
            <div class="border-bottom  mt-3 mb-3">
                <h4 class="text-center">Sửa blog</h4>
            </div>

            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                    <input name="title" type="input" class="form-control @error('title')is-invalid @enderror"
                        value="{{ $blog->title }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Nội dung</label>
                    <textarea name ="content" class="form-control @error('content')is-invalid @enderror" style="height: 100px;">{{ $blog->content }}</textarea>
                    @error('content')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="formFile" class="form-label">Hình ảnh</label>
                    <input name="image" class="form-control @error('image')is-invalid @enderror" type="file">
                    @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="radio" value="1"
                        {{ $blog->status == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Hiện
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="radio" value="0"
                        {{ $blog->status == 0 ? 'checked' : ''}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Ẩn
                        </label>
                    </div>
                </div>
                <div class="mb-4 text-center">
                    <button class="btn btn-success" style="width: 300px;">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
