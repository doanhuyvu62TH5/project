@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Cart</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cart</a>
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
                @if (Session::has('yes'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i>
                        {{ Session::get('yes') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('no'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i>
                        {{ Session::get('no') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="carttable">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
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
                                                        oninput="validity.valid||(value='1' );"
                                                        onblur="if(!value) value='1';"  min="1">
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
                                                    <button type="submit" onclick="return confirm('Are you sure want to delete product?')">
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
                                <a href="{{ route('order.checkout') }}" class="btn btn-success">Place Order</a>
                                <form action="#" method="post" class="d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-warning">Apply Coupon</button>
                                </form>
                            </div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning" type="submit" onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm khỏi giỏ hàng không?')">
                                    Xóa toàn bộ sản phẩm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 ml-auto">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>$230</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$70</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">$300</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="checkout.html" class="btn btn__bg d-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
