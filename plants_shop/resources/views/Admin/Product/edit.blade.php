@extends('Admin.layouts.app')
@section('contents')
    <div class="container">
        <div class="text-end">
            <a class="btn btn-success btn-sm" href="{{ route('product.index') }}">Quay lại</a>
        </div>
        <form action="{{ route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="text-center border-bottom" style="padding-bottom: 10px;">
                    <h4>Sửa Sản Phẩm</h4>
                </div>
                <div class="col-6 bg-white mt-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input name ="name" type="text" class="form-control @error('name')is-invalid @enderror" value="{{ $product->name }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số lượng</label>
                        <input name ="quantity" type="text" class="form-control @error('quantity')is-invalid @enderror" value="{{ $product->quantity }}">
                        @error('quantity')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nội dung</label>
                        <textarea id="editor" name ="content" class="form-control @error('content')is-invalid @enderror" style="height: 105px;">{{ $product->content }}</textarea>
                        @error('content')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">hình ảnh</label>
                        <input name="image" class="form-control @error('image')is-invalid @enderror" type="file">
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6 bg-white mt-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input name="price" type="text" class="form-control @error('price')is-invalid @enderror" value="{{ $product->price }}">
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá khuyển mãi</label>
                        <input name="sale_price" type="text" class="form-control @error('sale_price')is-invalid @enderror" value="{{ $product->sale_price }}">
                        @error('sale_price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Trạng thái</label>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="radio" value="1"
                            {{ $product->status == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Hiện
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="radio" value="0"
                            {{ $product->status == 0 ? 'checked' : ''}}>
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
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-success" style="width: 50%;">Cập nhật</button>
                    </div>
                </div>
        </form>
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