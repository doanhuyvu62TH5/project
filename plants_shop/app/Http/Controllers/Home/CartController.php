<?php

namespace App\Http\Controllers\Home;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CartController extends Controller
{
    public function index(){
        return view('Home.cart');
    }
    public function add(Product $product, Request $req) {

        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();

        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id 
        ])->first();
        
        // dd ($cartExist);
        if ($cartExist) {
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id 
            ])->increment('quantity', $quantity);

            // $cartExist->update([
            //     'quantity' => $cartExist->quantity + $quantity
            // ]);
            return redirect()->route('cart.index')->with('ok', 'Thêm vào giỏ hàng thành công!');
        } else {
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
       
        return redirect()->back()->with('no','Something error, please try again');
       
    }

    public function update(Product $product, Request $req) {
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

            return redirect()->route('cart.index')->with('ok','Update product quantity in cart successfully');;
        } 

        return redirect()->back()->with('no','Something error, please try again');
    }

    public function delete($product_id) {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product_id
        ])->delete();
        return redirect()->back()->with('ok','Deleted product in shopping cart');
    }

    public function clear() {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id
        ])->delete();

        return redirect()->back()->with('ok','Deleted all product in shopping cart');
    }
}
