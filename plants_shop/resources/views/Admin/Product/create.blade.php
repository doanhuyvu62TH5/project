@extends('Admin.layouts.app')
@section('contents')
    <div class="container">
        <div class="text-end">
            <a class="btn btn-success btn-sm" href="{{ route('product.index') }}">Quay lại</a>
        </div>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="text-center border-bottom">
                    <h4>Thêm sản phẩm</h4>
                </div>
                <div class="col-6 bg-white mt-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input name ="name" type="text" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số lượng</label>
                        <input name ="quantity" type="text" class="form-control @error('quantity')is-invalid @enderror" value="{{ old('quantity') }}">
                        @error('quantity')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nội dung</label>
                        <textarea name ="content" class="form-control @error('content')is-invalid @enderror"  style="height: 100px;">{{ old('content') }}</textarea>
                        @error('content')
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
                </div>
                <div class="col-6 bg-white mt-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input name="price" type="text" class="form-control @error('price')is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá khuyến mãi</label>
                        <input name="sale_price" type="text" class="form-control @error('sale_price')is-invalid @enderror" value="{{ old('sale_price') }}">
                        @error('sale_price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Trạng thái</label>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="radio" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Hiện
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="radio" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Ẩn
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Danh mục</label>
                        <select name="category_id" class="form-select @error('category_id')is-invalid @enderror" aria-label="select example">
                            <option value="">Chọn danh mục sản phẩm</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @if(old('category_id') == $cat->id) selected @endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-success" style="width: 50%;">Thêm</button>
                    </div>
                </div>
        </form>
    </div>
@endsection
