<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->limit(8)
            ->get();
        $flower = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.type', 1)
            ->where('products.status', 1)
            ->select('products.*')
            ->limit(8)
            ->get();
        $discounted_products = Product::orderBy('created_at', 'DESC')
            ->where('status', '1')
            ->whereNotNull('sale_price')
            ->limit(8)
            ->get();

        $blogs = Blog::orderBy('created_at', 'DESC')
            ->where('status', '1')
            ->limit(3)
            ->get();

        $sliders = Slider::orderBy('order', 'ASC')
            ->where('status', '1')
            ->get();
        return view('Home.index', compact('new_products', 'tree', 'flower', 'discounted_products','blogs','sliders'));

    }


    public function showAllProducts(Request $request)
    {
        $productsQuery = Product::where('status', '1');
        $productsQuery = $this->applyPriceFilter($productsQuery, $request->price_range);
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);
        $productsQuery = $this->applyPriceSale($productsQuery, $request->sale);
        $products = $productsQuery->paginate(12);
        $headerTitle = 'BỘ SƯU TẬP';
        $new_products = $this->getNewProducts();

        return view('Home.category', compact('products', 'headerTitle', 'new_products'));
    }
    public function showProductsByCategory(Request $request, Category $cat)
    {
        $productsQuery = $cat->products();
        $productsQuery = $this->applyPriceFilter($productsQuery, $request->price_range);
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);
        $productsQuery = $this->applyPriceSale($productsQuery, $request->sale);

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
        $productsQuery = $this->applyPriceFilter($productsQuery, $request->price_range);
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);
        $productsQuery = $this->applyPriceSale($productsQuery, $request->sale);
        $products = $productsQuery->paginate(12);
        $headerTitle = $this->getHeaderTitleByCategoryType($type);
        $new_products = $this->getNewProducts();

        return view('Home.category', compact('products', 'headerTitle', 'new_products'));
    }

    public function applySort($query, $sortBy)
    {
        if ($sortBy) {
            switch ($sortBy) {
                case 'price_asc':
                    $query->orderByRaw('IFNULL(sale_price, price) ASC');
                    break;
                case 'price_desc':
                    $query->orderByRaw('IFNULL(sale_price, price) DESC');
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
    public function applyPriceSale($query, $isSale)
    {
        if ($isSale) {
            $query->whereNotNull('sale_price');
        }
        return $query;
    }
    public function applyPriceFilter($query, $priceRange)
    {
        if ($priceRange) {
            switch ($priceRange) {
                case 'under_100000':
                    $query->where(function ($q) {
                        $q->where('sale_price', '<', 100000)
                        ->orWhereNull('sale_price')
                        ->where('price', '<', 100000);
                    });
                    break;
                case '100000_400000':
                    $query->where(function ($q) {
                        $q->whereBetween('sale_price', [100000, 400000])
                        ->orWhereNull('sale_price')
                        ->whereBetween('price', [100000, 400000]);
                    });
                    break;
                case 'above_400000':
                    $query->where(function ($q) {
                        $q->where('sale_price', '>', 400000)
                        ->orWhereNull('sale_price')
                        ->where('price', '>', 400000);
                    });
                    break;
            }
        }
        return $query;
    }
    public function getHeaderTitleByCategoryType($type)
    {
        return $type == '0' ? 'BỘ SƯU TẬP VỀ CÂY' : ($type == '1' ? 'BỘ SƯU TẬP VỀ HOA' : 'BỘ SƯU TẬP');
    }

    public function getNewProducts()
    {
        return Product::orderBy('created_at', 'DESC')
            ->where('status', '1')
            ->limit(3)
            ->get();
    }

    public function showProduct(Product $product)
    {
        $comments = $product->comments()->get();
        return view('Home.product', compact('product', 'comments'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm theo tên sản phẩm hoặc nội dung sản phẩm
        $products = Product::where('name', 'LIKE', "%{$query}%")
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


    public function contact()
    {
        return view('Home.Contact');
    }
    public function contact_post(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
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
            ]
        );
        $data = $request->all('name', 'email', 'phone', 'subject', 'message');
        Contact::create($data);
        return redirect()->route('contact_us.index')->with('success', 'Cảm ơn bạn đã đóng góp với chúng tôi! Chúng tôi sẽ phản hồi qua email của bạn trong thời gian sớm nhất.');
    }
    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')
            ->where('status', '1')
            ->limit(6)
            ->get();
        $new_products = $this->getNewProducts();
        return view('Home.blog', compact('blogs', 'new_products'));
    }
    public function showBlogDetail(Blog $blog)
    {
        $comments = $blog->comments()->get();
        $new_products = $this->getNewProducts();
        return view('Home.blog-detail', compact('blog', 'new_products', 'comments'));
    }

    public function comment_post(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'product_id' => 'nullable|exists:products,id',
            'blog_id' => 'nullable|exists:blogs,id',
        ]);

        // Tạo mới comment bằng phương thức create
        Comment::create([
            'customer_id' => auth('cus')->id(),
            'product_id' => $request->input('product_id'),
            'blog_id' => $request->input('blog_id'),
            'comment' => $request->input('comment'),
            'type' => $request->input('type'),
        ]);

        return redirect()->back()->with('success', 'Đã đăng bình luận!');
    }
    public function delete_comment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Xoá bình luận thành công!');
    }

}
