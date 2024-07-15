@extends('Home.master.main')
@section('content')
    <div class="homecart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1>Liên hệ</h1>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="custom-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang
                                    chủ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="mb-3">ĐÓNG GÓP, PHẢN HỒI VỚI CHÚNG TÔI</h5>
                <form action="{{ route('send') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                            <input class="form-control" name="name" placeholder="Tên của bạn *" type="text" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                            <input class="form-control" name="phone" placeholder="Số điện thoại *" type="text" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                            <input class="form-control" name="email" placeholder="Email *" type="text" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                            <input class="form-control" name="subject" placeholder="Chủ đề *" type="text" required>
                        </div>
                        <div class="col-12 mb-3">
                            <textarea placeholder="Lời nhắn *" name="message" class="form-control" required style="height: 132px;"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-danger">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <h5 class="mb-3">LIÊN HỆ</h5>
                <p>Cảm ơn bạn đã quan tâm đến chúng tôi.</p>
                <p>Nếu bạn có bất kỳ câu hỏi, góp ý hoặc yêu cầu nào, vui lòng điền vào biểu mẫu bên cạnh. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất. </p>
                <p>Chúng tôi rất trân trọng những ý kiến đóng góp từ phía khách hàng để có thể cải thiện dịch vụ của mình ngày càng tốt hơn.</p>
                <div class="row">
                    <div class="col-12 mb-3 border-bottom">
                        <strong><i class="fa fa-fax"></i>
                         Địa chỉ : Xóm Nam Phong, Xã Nam Phong, Tp.Nam Định, Tỉnh Nam Định.</strong>
                    </div>
                    <div class="col-12 mb-3 border-bottom">
                        <strong><i class="fa fa-phone"></i>
                         Số điện thoại : 0833388292</strong>
                    </div>
                    <div class="col-12 mb-3 border-bottom">
                        <strong><i class="fa fa-envelope"></i>
                         Email: huyvu31032002@gmail.com</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection