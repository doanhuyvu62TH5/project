@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Giỏ hàng</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
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

    <div class="cartmain" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                @if($carts->count() > 0)
                    <div class="col-lg-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $item)
                                        <tr>
                                            <td scope="row">{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->product->image) }}" width="70" height="80">
                                            </td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <form action="{{ route('cart.update', $item->product_id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="number" value="{{ $item->quantity }}" name="quantity"
                                                        style="width: 60px; text-align:center"
                                                        oninput="validity.valid||(value='1' );" onblur="if(!value) value='1';"
                                                        min="1">
                                                    <button><i class="fa fa-save"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                {{-- Tính tổng giá trị bằng cách nhân giá với số lượng --}}
                                                {{ $item->price * $item->quantity }}
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.delete', $item->product_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure want to delete product?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block d-flex justify-content-between">
                            <div>
                                <a href="{{ route('order.checkout') }}" class="btn btn-success">Đặt hàng ngay</a>
                            </div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning" type="submit"
                                    onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm khỏi giỏ hàng không?')">
                                    Xóa toàn bộ sản phẩm
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <h6 class="text-center">Không có sản phẩm nào trong giỏ hàng!</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
