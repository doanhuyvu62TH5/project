<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('Home.Contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ],
        [
            'name.required' => 'Vui lòng điền họ tên!',
            'email.required' => 'Vui lòng điền email!',
            'phone.required' => 'Vui lòng điền số điện thoại!',
            'subject.required' => 'Vui lòng điền chủ đề!',
            'message.required' => 'Vui lòng chọn ghi lời nhắn!',
        ]);
        $data = $request->all('name','email','phone','subject','message');
        Contact::create($data);
        return redirect()->route('contact_us.index')->with('success','Cảm ơn bạn đã đóng góp với chúng tôi! Chúng tôi sẽ phản hồi qua email của bạn trong thời gian sớm nhất.');
    }
}
