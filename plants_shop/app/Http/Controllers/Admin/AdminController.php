<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class AdminController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $customerCount = Customer::count();
        $categoryCount = Category::count();
        $commentCount = Comment::count();
        $contributeCount = Contact::count();
        $blogCount = Blog::count();
        $SliderCount = Slider::count();
        $orderCount = Order::where('status', 0)->count();
        $orderdeliveredCount = Order::where('status', 4)->count();
        $orderShippingCount = Order::where('status', 3)->count();
        return view('Admin.index',compact('productCount','customerCount',
                                        'categoryCount','blogCount',
                                        'commentCount','orderCount',
                                        'orderShippingCount','orderdeliveredCount',
                                        'contributeCount','SliderCount'));
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
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        $data = $request->only('email','password');
        $check = auth()->attempt($data);
        if($check){
            return redirect()->route('admin.index')->with('success','Đăng nhập thành công!');
        }
        return redirect()->back()->with('no','Thông tin tài khoản hoặc mật khẩu không đúng!');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('success','Đã đăng xuất!');
    }
}
