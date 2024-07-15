@extends('Admin.layouts.app')
@section('contents')
    <div>
        <div class="text-end">
            <a class="btn btn-success btn-sm" href="{{ route('category.index') }}">Quay lại</a>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-7 bg-light">
            <div class="border-bottom  mt-3 mb-3">
                <h4 class="text-center">Sửa Danh Mục Sản Phẩm</h4>
            </div>
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
                    <input name="name" type="input" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="1"
                            {{ $category->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Hiện
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="0"
                            {{ $category->status == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Ẩn
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Loại</label>
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option {{ $category->type == 0 ? 'selected' : '' }} value="0">Cây</option>
                        <option {{ $category->type == 1 ? 'selected' : '' }} value="1">Hoa</option>
                    </select>
                </div>
                <div class="mb-4 text-center">
                    <button type="submit" class="btn btn-success" style="width: 300px;">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
