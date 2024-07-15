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
                <h4 class="text-center">Thêm Mới Blog</h4>
            </div>

            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                    <input name="title" type="input" class="form-control @error('title')is-invalid @enderror"
                        value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Nội dung</label>
                    <textarea name ="content" id="editor" class="form-control @error('content')is-invalid @enderror" style="height: e00px;"></textarea>
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
                        <input class="form-check-input" type="radio" name="status" value="1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Hiện
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="0">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Ẩn
                        </label>
                    </div>
                </div>
                <div class="mb-4 text-center">
                    <button class="btn btn-success" style="width: 300px;">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
