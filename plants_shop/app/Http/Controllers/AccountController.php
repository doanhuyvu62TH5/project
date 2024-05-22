<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Models\Customer;
use Illuminate\Http\Request;
use Mail;
use Hash;
use Auth;

class AccountController extends Controller
{
    public function login()
    {
        return view('Account.login');
    }

    public function check_login(Request $req) {
        $req->validate([
            'email' => 'required|exists:customers',
            'password' => 'required'
        ]);

        $data = $req->only('email','password');

        $check = auth('cus')->attempt($data);

        if ($check) {
            if (auth('cus')->user()->email_verified_at == '') {
                auth('cus')->logout();
                return redirect()->back()->with('no','You account is not verify, please check email again');
            }

            return redirect()->route('home.index')->with('ok','Welcome back');
        }

        return redirect()->back()->with('no','Your account or password invalid');

    }
    public function register()
    {
        return view('Account.register');
    }
    function check_register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Họ tên không được để tróng',
            'name.min' => 'Họ ten tối thiểu là 6 ký tự'
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
