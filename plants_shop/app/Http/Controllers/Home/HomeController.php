<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Contact;
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
            ->get();
        return view('Home.index', compact('new_products', 'tree', 'flower'));

    }

    public function showAllProducts(Request $request)
    {
        $productsQuery = Product::where('status', '1');
        $productsQuery = $this->applyPriceFilter($productsQuery, $request->price_range);
        $productsQuery = $this->applySort($productsQuery, $request->sort_by);
        $products = $productsQuery->paginate(12);
        $headerTitle = 'Tất cả sản phẩm';
        $new_products = $this->getNewProducts();

        return view('Home.category', compact('products', 'headerTitle', 'new_products'));
    }
    public function showProductsByCategory(Request $request, Category $cat)
    {
        $productsQuery = $cat->products();
        $productsQuery = $this->applyPriceFilter($productsQuery, $request->price_range);
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
        $productsQuery = $this->applyPriceFilter($productsQuery, $request->price_range);
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
    private function applyPriceFilter($query, $priceRange)
    {
        if ($priceRange) {
            switch ($priceRange) {
                case 'under_100000':
                    $query->where('price', '<', 100000);
                    break;
                case '100000_200000':
                    $query->whereBetween('price', [100000, 200000]);
                    break;
                case 'above_200000':
                    $query->where('price', '>', 200000);
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
        $comments = $product->comments()->where('status', 0)->get();
        return view('Home.product', compact('product','comments'));
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


    public function contact()
    {
        return view('Home.Contact');
    }
    public function contact_post(Request $request)
    {
        $request->validate([
            'name' =>'required',
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
        ]);
        $data = $request->all('name','email','phone','subject','message');
        Contact::create($data);
        return redirect()->route('contact_us.index')->with('success','Cảm ơn bạn đã đóng góp với chúng tôi! Chúng tôi sẽ phản hồi qua email của bạn trong thời gian sớm nhất.');
    }
    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')
                    ->where('status', '1')
                    ->limit(6)
                    ->get();
        $new_products = $this->getNewProducts();
        return view('Home.blog',compact('blogs','new_products'));
    }
    public function showBlogDetail(Blog $blog)
    {
        $comments = $blog->comments()->where('status', 0)->get();
        $new_products = $this->getNewProducts();
        return view('Home.blog-detail', compact('blog','new_products','comments'));
    }

    public function comment_post(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'product_id' => 'nullable|exists:products,id',
            'blog_id' => 'nullable|exists:blogs,id',
            'type' => 'required|in:product,blog',
        ]);

        // Tạo mới comment bằng phương thức create
        Comment::create([
            'customer_id' => auth('cus')->id(),
            'product_id' => $request->input('product_id'),
            'blog_id' => $request->input('blog_id'),
            'comment' => $request->input('comment'),
            'parent_id' => $request->input('parent_id', 0),
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
