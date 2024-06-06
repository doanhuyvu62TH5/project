<?php

namespace App\Http\Controllers\Home;

use App\Mail\VerifyAccount;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login()
    {
        return view('Account.login');
    }
    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('account.login')->with('ok','Đăng xuất thành công!');
    }

    public function check_login(Request $req) {
        $req->validate([
            'email' => 'required|exists:customers',
            'password' => 'required',
        ],[
            'email.required' => 'Email không được để trống!',
            'email.exists' => 'Tài khoản không tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
    
        $data = $req->only('email', 'password');
    
        // Find customer by email
        $customer = Customer::where('email', $data['email'])->first();
    
        // Check if customer exists and password is correct
        if ($customer && Hash::check($data['password'], $customer->password)) {
            if ($customer->email_verified_at == null) {
                return redirect()->back()->with('no', 'Tài khoản của bạn chưa được xác thực, vui lòng kiểm tra lại Email');
            }
    
            // Perform login
            auth('cus')->login($customer);
    
            return redirect()->route('home.index')->with('ok', 'Đăng nhập thành công!');
        }
    
        return redirect()->back()->withErrors(['password' => 'Mật khẩu không chính xác!']);
    }
    
    public function register()
    {
        return view('Account.register');
    }
    function check_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'address' => 'required',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Vui lòng nhập họ tên!',
            'email.required' => 'Vui lòng nhập email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.regex' => 'Số điện thoại không chính xác!',
            'confirm_password' => 'Mật khẩu không trùng khớp!'
        ]);
        $data = $request->all('name', 'email', 'phone', 'address');
        $data['password'] = bcrypt($request->password);
        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok', 'dangf ki thanh cong');
        }
        return redirect()->back('no', 'loi');
    }
    public function verify($email)
    {
        $acc = Customer::where('email', $email)->whereNULL('email_verified_at')->firstOrFail();
        Customer::where('email', $email)->update(['email_verified_at' => date('Y-m-d')]);
        return redirect()->route('account.login')->with('ok', 'thanh cong');
    }
    public function chage_password()
    {
        return view('Account.chage_password');
    }
    public function check_chage_password()
    {

    }
    public function forgot_password()
    {
        return view('Account.forgot_password');
    }
    public function check_forgot_password()
    {

    }
    public function profile()
    {
        return view('Account.profile');
    }
    public function check_profile()
    {

    }
    public function reset_password()
    {
        return view('Account.reset_password');
    }
    public function check_reset_password()
    {

    }
}
