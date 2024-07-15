@extends('Admin.layouts.app')
@section('contents')
    <div class="container">
        <div class="text-end">
            <a class="btn btn-success btn-sm" href="{{ route('slider.index') }}">Quay lại</a>
        </div>
        <form action="{{ route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="text-center border-bottom" style="padding-bottom: 10px;">
                    <h4>Sửa Slider</h4>
                </div>
                <div class="col-6 bg-white mt-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input name ="title" type="text" class="form-control @error('title')is-invalid @enderror" value="{{ $slider->title }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input name="image" class="form-control @error('image')is-invalid @enderror" type="file">
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Thứ tự</label>
                        <input name ="order" type="number" class="form-control @error('order')is-invalid @enderror" value="{{ $slider->order }}">
                        @error('order')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Trạng thái</label>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="radio" value="1"
                            {{ $slider->status == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Hiện
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="radio" value="0"
                            {{ $slider->status == 0 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ẩn
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-success" style="width: 50%;">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
