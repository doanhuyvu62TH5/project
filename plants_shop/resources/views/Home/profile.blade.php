@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Tài khoản của tôi</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Giỏ hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row border align-items-center">
            <div class="col-md-3">
                <div class="row text-center">
                    <div class="col-12">
                        <img src="{{ is_null($customer->image) ? 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' : asset($customer->image) }}"
                            alt="avatar" class="rounded-circle img-fluid" style="height:150px ;width: 150px;">
                        <!-- Button trigger modal -->
                        <ul class="nav justify-content-center mt-3">
                            <li class="nav-item">
                                <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </li>
                            @if (!is_null($customer->image))
                                <li class="nav-item">
                                    <form action="{{ route('account.deleteimg', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Bạn có muốn xóa hình ảnh này không?')"
                                            class="btn btn-light"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </li>
                            @endif

                        </ul>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('account.updateimg', $customer->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thay đổi hình ảnh</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input name="image" class="form-control @error('image')is-invalid @enderror"
                                                type="file">
                                            @error('image')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h5 class="my-3">{{ $auth->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-3">
                        <p><i class="fas fa-user"></i> Họ và tên: </p>
                        <p><i class="fas fa-envelope"></i> Email: </p>
                        <p><i class="fas fa-phone"></i> Số điện thoại: </p>
                        <p><i class="fas fa-address-card"></i> Địa chỉ: </p>
                    </div>
                    <div class="col-8">
                        <p>{{ $auth->name }}</p>
                        <p>{{ $auth->email }}</p>
                        <p>{{ $auth->phone }}</p>
                        <p>{{ $auth->address }}</p>
                    </div>
                    <div class="col-12 mt-3">
                        <!-- Scrollable modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Chỉnh sửa thông tin
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('account.updateinfor', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Sửa thông tin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="name"
                                                    class="form-control @error('name')is-invalid @enderror"
                                                    value="{{ $auth->name }}" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Họ và tên</label>
                                                @error('name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 form-floating">
                                                <input type="email" name="email"
                                                    class="form-control @error('email')is-invalid @enderror"
                                                    value="{{ $auth->email }}" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Email</label>
                                                @error('email')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="phone"
                                                    class="form-control @error('phone')is-invalid @enderror"
                                                    value="{{ $auth->phone }}" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Số điện thoại</label>
                                                @error('phone')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="address"
                                                    class="form-control @error('address')is-invalid @enderror"
                                                    value="{{ $auth->address }}" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Địa chỉ</label>
                                                @error('email')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
