@extends('Admin.layouts.app')
@section('contents')
    <div class="row justify-content-center" style="height: 300px; margin-top:100px;">

        <div class="col-6  bg-light" style="border-radius: 20px">
            <div style="margin: 20px 0px;">
                <h4 class="text-center">Sửa danh mục</h4>
            </div>
            <form action="{{ route('category.update',$category->id)
            }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input name="name" type="input" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="1"
                        {{ $category->status == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Hiện
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="0"
                        {{ $category->status == 0 ? 'checked' : ''}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Ẩn
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option {{ $category->type == 0 ? 'selected' : ''}} value="0">Cây</option>
                        <option {{ $category->type == 1 ? 'selected' : ''}} value="1">Hoa</option>
                      </select>
                </div>
                <div class="mb-4 text-center">
                    <div class="d-grid">
                        <button class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
