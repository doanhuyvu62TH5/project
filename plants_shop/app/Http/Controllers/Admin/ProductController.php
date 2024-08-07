<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('Admin.Product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->select('id','name')->get();
        return view("Admin.Product.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:products',
            'price' =>'required|numeric',
            'sale_price' => 'nullable|numeric|lte:price',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif',
            'content' =>'required',
            'quantity' =>'required|numeric|gte:0',
            'category_id' => 'required|exists:categories,id'
        ],
        [
            'name.required' => 'Vui lòng điền tên sản phẩm!',
            'name.unique' => 'Tên đã tồn tại!',
            'price.required' => 'Vui lòng nhập sản phẩm!',
            'price.numeric' => 'Giá sản phẩm không hợp lệ!',
            'sale_price.numeric' => 'Giá sale sản phẩm không hợp lệ!',
            'sale_price.lte' => 'Giá sale phải nhỏ hơn giá mặc định!',
            'image.file' => 'File ảnh không hợp lệ!',
            'image.required' => 'Vui lòng chọn ảnh!',
            'quantity.numeric' => 'Số lượng sản phẩm không hợp lệ!',
            'quantity.gte' => 'âm!',
            'content.required' => 'Vui lòng nhập nội dung',
            'category_id.required' => 'Vui lòng chọn danh mục'
        ]);
        $filename = NULL;
        $path = NULL;
        // if($request->has('image')){
        //     $file = $request->file('image');
        //     $filename = date('YmdHis').'.'.$file->getClientOriginalExtension();
        //     $path = 'uploads/product/';
        //     $file->move($path,$filename);
        // }
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = date('YmdHis').'.'.$extension;

            $path = 'uploads/product/';
            $file->move($path, $filename);
            session()->put('image_name', $filename);
        }
    
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' =>$request->sale_price,
            'content' =>$request->content,
            'quantity' =>$request->quantity,
            'image' => $path.$filename,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);
        return redirect()->route('product.index')->with('success','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name','ASC')->select('id','name')->get();
        return view("Admin.Product.edit",compact('categories','product')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,'.$product->id,
            'price' =>'required|numeric',
            'sale_price' => 'nullable|numeric|lte:price',
            'image' => 'file|mimes:jpg,jpeg,png,gif',
            'content' =>'required',
            'quantity' =>'required|numeric|gte:0',
            'category_id' => 'required|exists:categories,id'
        ],
        [
            'name.required' => 'Vui lòng điền tên sản phẩm!',
            'name.unique' => 'Tên đã tồn tại!',
            'price.required' => 'Vui lòng nhập sản phẩm!',
            'price.numeric' => 'Giá sản phẩm không hợp lệ!',
            'sale_price.numeric' => 'Giá sale sản phẩm không hợp lệ!',
            'sale_price.lte' => 'Giá sale phải nhỏ hơn giá mặc định!',
            'image.file' => 'File ảnh không hợp lệ!',
            'quantity.numeric' => 'Số lượng sản phẩm không hợp lệ!',
            'quantity.gte' => 'âm!',
            'content.required' => 'Vui lòng nhập nội dung',
            'category_id.required' => 'Vui lòng chọn danh mục'
        ]);
        $oldImagePath = $product->image;
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = date('YmdHis').'.'.$extension;

            $path = 'uploads/product/';
            $file->move($path, $filename);

            if(File::exists($product->image)){
                File::delete($product->image);
            }
            $product->update(['image' => $path.$filename]);
        }
        else {
            // Nếu không có ảnh mới được tải lên, giữ nguyên ảnh cũ
            $product->update(['image' => $oldImagePath]);
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' =>$request->sale_price,
            'content' =>$request->content,
            'quantity' =>$request->quantity,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);
        return redirect()->route('product.index')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
        if(File::exists($product->image)){
            File::delete($product->image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa thành công!');
    }
}
