<?php

namespace App\Http\Controllers\Home;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        return view('Home.cart');
    }
    public function add(Product $product, Request $req)
    {

        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();
        $redirectPage = $req->redirect;
        $productName = $product->name;

        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();
        if ($cartExist) {
            $newQuantity = $cartExist->quantity + $quantity;
            if ($newQuantity > $product->quantity) {
                // Chuyển hướng dựa vào trang hiện tại
                if ($redirectPage === 'product-detail') {
                    return redirect()->back()->with('error', 'Số lượng sản phẩm bạn vừa nhập với số lượng sản phẩm trong giỏ hàng đã LỚN HƠN số lượng sản phẩm đang có trong cửa hàng!');
                } else {
                    $message = "Số lượng sản phẩm $productName trong giỏ hàng của bạn đã đạt mức tối đa số lượng sản phẩm của cửa hàng!";
                    return redirect()->back()->with('error', $message);
                }
            }
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
            return redirect()->route('cart.index')->with('success', 'Thêm vào giỏ hàng thành công!');

        } else {
            if ($quantity > $product->quantity) {
                // Nếu số lượng yêu cầu vượt quá số lượng tồn kho, trả về thông báo lỗi
                if ($redirectPage === 'product-detail') {
                    return redirect()->back()->with('error', 'Số lượng sản phẩm bạn nhập LỚN HƠN số lượng sản phẩm sẵn có của cửa hàng!');
                }
            }
            $data = [
                'customer_id' => auth('cus')->id(),
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $quantity
            ];

            if (Cart::create($data)) {
                return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng');
            }
        }
        return redirect()->back()->with('error', 'Something error, please try again');
    }

    public function update(Product $product, Request $req)
    {
        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();
        $productName = $product->name;
        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {
            if ($quantity > $product->quantity) {
                $message_1 = "Số lượng sản phẩm $productName bạn đã nhập LỚN HƠN số lượng sản phẩm sẵn có của cửa hàng!";
                return redirect()->back()->with('error_update_cart', $message_1);
            }
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->update([
                        'quantity' => $quantity
                    ]);
            $message_2 = "Cập nhật số lượng sản phẩm $productName thành công!";
            return redirect()->route('cart.index')->with('success_update_cart', $message_2);
            ;
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function delete($product_id)
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product_id
        ])->delete();
        return redirect()->back()->with('ok', 'Xóa sản phẩm thành công!');
    }

    public function clear()
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id
        ])->delete();

        return redirect()->back()->with('ok', 'Đã xóa tất cả sản phẩm trong giỏ hàng!');
    }
}
