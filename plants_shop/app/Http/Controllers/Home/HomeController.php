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

    public function showAllProducts(Request $request)
    {
        $productsQuery = Product::where('status', '1');
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);

        $products = $productsQuery->paginate(12);
        $headerTitle = 'Tất cả sản phẩm';
        $new_products = $this->getNewProducts();

        return view('Home.category', compact('products', 'headerTitle', 'new_products'));
    }
    public function showProductsByCategory(Request $request, Category $cat)
    {
        $productsQuery = $cat->products();
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);

        $products = $productsQuery->paginate(12);
        $headerTitle = $this->getHeaderTitleByCategoryType($cat->type);
        $new_products = $this->getNewProducts();

        return view('Home.category', compact('products', 'headerTitle', 'new_products', 'cat'));
    }



    public function showProductsByType(Request $request, $type)
    {
        $productsQuery = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.type', $type)
            ->select('products.*');
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);

        $products = $productsQuery->paginate(12);
        $headerTitle = $this->getHeaderTitleByCategoryType($type);
        $new_products = $this->getNewProducts();

        return view('Home.category', compact('products', 'headerTitle', 'new_products'));
    }

    private function applySort($query, $sortBy)
    {
        if ($sortBy) {
            switch ($sortBy) {
                case 'price_asc':
                    $query->orderBy('price', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'DESC');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'ASC');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'DESC');
                    break;
                case 'created_asc':
                    $query->orderBy('created_at', 'ASC');
                    break;
                case 'created_desc':
                    $query->orderBy('created_at', 'DESC');
                    break;
            }
        }
        return $query;
    }

    private function getHeaderTitleByCategoryType($type)
    {
        return $type == '0' ? 'Cây cảnh' : ($type == '1' ? 'Hoa' : 'Sản phẩm');
    }

    private function getNewProducts()
    {
        return Product::orderBy('created_at', 'DESC')
            ->where('status', '1')
            ->limit(3)
            ->get();
    }

    public function showProduct(Product $product)
    {
        $products = Product::where('category_id', $product->category_id)->limit(12)->get();
        return view('Home.product', compact('product', 'products'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm theo tên sản phẩm hoặc nội dung sản phẩm
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->where('status', 1)
            ->select('products.*'); // Chọn các cột cần thiết

        // Tìm kiếm theo tên danh mục
        $productsInCategory = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.name', 'LIKE', "%{$query}%")
            ->where('products.status', 1)
            ->select('products.*'); // Chọn các cột cần thiết

        // Kết hợp kết quả của hai câu truy vấn bằng union()
        $products = $products->union($productsInCategory->getQuery());

        // Áp dụng sắp xếp
        $products = $this->applySort($products, $request->sort_by);

        // Lấy kết quả phân trang
        $products = $products->paginate(12);

        return view('Home.search_products', compact('products', 'query'));
    }
}
