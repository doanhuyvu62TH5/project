<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }
    public function showRegistrationForm()
    {
        return view('Admin.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "user"
        ]);
 
        return redirect()->route('admin.login')->with('success', 'Đăng kí tài khoản thành công!');;
    }
    public function showLoginForm()
    {
        return view('Admin.login');
    }
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->only('email','password');
        $check = auth()->attempt($data);
        if($check){
            return redirect()->route('admin.index')->with('success','welcom admin');
        }
        return redirect()->back()->with('error','Email or Password is no match');
    }

    // public function logout(){
    //     auth()->logout();
    //     return redirect()->route('admin.login')->with('success','logouted');
    // }
}
