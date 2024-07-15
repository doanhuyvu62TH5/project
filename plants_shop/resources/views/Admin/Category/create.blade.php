@extends('Admin.layouts.app')
@section('contents')
    <div>
        <div class="text-end">
            <a class="btn btn-success btn-sm" href="{{ route('category.index') }}">Quay lại</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-7 bg-light" style="border-radius: 20px">
            <div class="border-bottom  mt-3 mb-3">
                <h4 class="text-center">Thêm Mới Danh Mục Sản Phẩm</h4>
            </div>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
                    <input name="name" type="input" class="form-control @error('name')is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name')
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
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Loại</label>
                    <select class="form-select @error('type') is-invalid @enderror" aria-label="Default select example"
                        name="type">
                        <option value="" selected disabled hidden>Loại</option>
                        <option value="0">Cây</option>
                        <option value="1">Hoa</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-4 text-center">
                    <button class="btn btn-success" style="width: 300px;">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
