@extends('Home.master.main')

@section('content')
    <!-- main-area -->
        <!-- breadcrumb-area -->
        <div class="homecart">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h1>Check out</h1>
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
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area">

            <div class="contact-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input name="name" value="{{ $auth->name }}" type="text" class="form-control" placeholder="Your Name *" required>
                                    @error('name')
                                        <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" value="{{ $auth->email }}"  type="email" class="form-control" placeholder="Your Email *" required>
                                    @error('email')
                                        <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input name="phone" type="text" value="{{ $auth->phone }}"  class="form-control" placeholder="Your phone *" required>
                                    @error('phone')
                                        <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input name="address" type="text" value="{{ $auth->address }}"  class="form-control" placeholder="Your address *" required>
                                    @error('address')
                                        <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>

                                <br>
                                <button type="submit">Place Order</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($carts as $item)
                                        <tr>
                                            <td scope="row">{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->product->image) }}" width="40">
                                            </td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                {{ $item->quantity }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    <!-- main-area-end -->

@endsection
