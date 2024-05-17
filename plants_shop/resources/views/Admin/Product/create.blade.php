@extends('Admin.layouts.app')
@section('contents')
    <div>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center" style="padding-top: 50px;">
                <div class="text-center" style="padding-bottom: 50px;">
                    <h4>Thêm sản phẩm</h4>
                </div>
                <div class="col-4 bg-white">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input name ="name" type="text" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Content</label>
                        <textarea name ="content" class="form-control @error('content')is-invalid @enderror" value="{{ old('content') }}" style="height: 189px;"></textarea>
                        @error('content')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input name="image" class="form-control @error('image')is-invalid @enderror" type="file">
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4 bg-white">
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input name="price" type="text" class="form-control @error('price')is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Sale Price</label>
                        <input name="sale_price" type="text" class="form-control @error('sale_price')is-invalid @enderror" value="{{ old('sale_price') }}">
                        @error('sale_price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Status</label>
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
                            <option value="">Open this select menu</option>
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
