@extends('Admin.layouts.app')
@section('contents')
    <div class="row justify-content-center" style="height: 300px; margin-top:100px;">

        <div class="col-6  bg-light" style="border-radius: 20px">
            <div style="margin: 20px 0px;">
                <h4 class="text-center">Thêm danh mục</h4>
            </div>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input name="name" type="input" class="form-control @error('name')is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
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
                    <label for="exampleFormControlInput1" class="form-label">Type</label>
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
                    <div class="d-grid">
                        <button class="btn btn-success">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
