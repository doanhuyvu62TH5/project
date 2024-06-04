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
                    return redirect()->back()->with('no', 'Không thể thêm vào giỏ hàng! 
                                                        Vui lòng kiểm tra lại số lượng của sản phẩm bạn đã thêm vào giỏ hàng với số lượng bạn vừa nhập đã vượt mức số lượng sản phẩm của cửa hàng!');
                } else {
                    $message = "Không thể thêm số lượng sản phẩm $productName vào giỏ hàng VÌ số lượng sảng phẩm $productName trong giỏ hàng đã đạt tới mức tối đa số lượng sản phẩm của cửa hàng!";
                    return redirect()->route('cart.index')->with('no', $message);
                }
            }
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
            return redirect()->route('cart.index')->with('ok', 'Thêm vào giỏ hàng thành công!');

        } else {
            if ($quantity > $product->quantity) {
                // Nếu số lượng yêu cầu vượt quá số lượng tồn kho, trả về thông báo lỗi
                if ($redirectPage === 'product-detail') {
                    return redirect()->back()->with('no', 'Không thể thêm vào giỏ hàng! Số lượng sản phẩm bạn đặt LỚN HƠN số lượng sản phẩm của của hàng!');
                }
            }
            $data = [
                'customer_id' => auth('cus')->id(),
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $quantity
            ];

            if (Cart::create($data)) {
                return redirect()->route('cart.index')->with('ok', 'Thêm vào giỏ hàng');
            }
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function update(Product $product, Request $req)
    {
        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();

        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {

            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->update([
                        'quantity' => $quantity
                    ]);

            return redirect()->route('cart.index')->with('ok', 'Update product quantity in cart successfully');
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
        return redirect()->back()->with('ok', 'Deleted product in shopping cart');
    }

    public function clear()
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id
        ])->delete();

        return redirect()->back()->with('ok', 'Deleted all product in shopping cart');
    }
}
