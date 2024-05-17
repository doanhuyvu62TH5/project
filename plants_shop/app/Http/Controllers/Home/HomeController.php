<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $new_products = Product::orderBy('created_at', 'DESC')
            ->where('status', 1)
            ->limit(8)->get();
        $tree = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.type', 0)
            ->where('products.status', 1)
            ->select('products.*')
            ->get();
        $flower = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.type', 1)
            ->where('products.status', 1)
            ->select('products.*')
            ->get();
        return view('Home.index', compact('new_products', 'tree', 'flower'));

    }
    // public function category(Category $cat = null, $type = null){
    //     if (!is_null($cat)) {
    //         $products = $cat->products()->paginate(12);
    //     } elseif (!is_null($type)) {
    //         $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
    //                             ->where('categories.type', $type)
    //                             ->paginate(12);
    //     } else {
    //         $products = Product::orderBy('created_at','DESC')
    //                             ->where('status',1)
    //                             ->limit(8)->get();
    //     }
    
    //     $new_products = Product::orderBy('created_at','DESC')
    //                             ->where('status',1)
    //                             ->limit(3)->get();
    
    //     return view('Home.category', compact('cat','products','new_products'));
    // }
    
    public function showProducts(Category $cat = null,$type = null)
    {
        if (!is_null($cat)) {
            // Hiển thị sản phẩm theo danh mục
            $products = $cat->products()->paginate(12);
            $headerTitle = $cat->type == '0' ? 'Cây cảnh' : ($cat->type == '1' ? 'Hoa' : 'Sản phẩm');
        } elseif (!is_null($type)) {
            // Hiển thị sản phẩm theo loại
            $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.type', $type)
                ->paginate(12);
            $headerTitle = $type == '0' ? 'Cây cảnh' : ($type == '1' ? 'Hoa' : 'Sản phẩm');
        } else {
            // Hiển thị tất cả sản phẩm
            $products = Product::paginate(12);
            $headerTitle = 'Tất cả sản phẩm';
            $cat = null;
        }

        $new_products = Product::orderBy('created_at', 'DESC')
                                ->where('status', '1')
                                ->limit(3)
                                ->get();

        return view('Home.category', compact('cat', 'products', 'new_products', 'headerTitle'));
    }

    public function showProduct(Product $product){
        $products = Product::where('category_id', $product->category_id)->limit(12)->get();
        return view('Home.product', compact('product', 'products'));
    }




















    // public function category(Category $cat = null){
    //     $products = $cat->products()->paginate(12);
    //     $new_products = Product::orderBy('created_at','DESC')
    //                             ->where('status',1)
    //                             ->limit(8)->get();
    //     $new_products = Product::orderBy('created_at','DESC')
    //                             ->where('status',1)
    //                             ->limit(3)->get();
    //     return view('Home.category', compact('cat','products','new_products'));
    // }

    // public function showAllProducts(){
    //     $products = Product::paginate(12); // Paginate nếu bạn muốn chia trang, nếu không có thể dùng Product::all()
    //     $cat = null; // Đặt cat là null để biểu thị không có danh mục cụ thể
    //     return view('Home.category', compact('cat', 'products'));
    // }

    // public function showProductsByType($type)
    // {
    //     $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
    //                         ->where('categories.type', $type)
    //                         ->paginate(12);
    //     return view('Home.category', compact('products'));
    // }
}
