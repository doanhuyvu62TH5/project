<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(5);
        return view('Admin.Blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|unique:blogs',
            'content' =>'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif',
        ],
        [
            'title.required' => 'Vui lòng điền tiêu đề!',
            'content.unique' => 'Tiêu đề đã tồn tại!',
            'image.file' => 'File ảnh không hợp lệ!',
            'content.required' => 'Vui lòng nhập nội dung',
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

            $path = 'uploads/blogs/';
            $file->move($path, $filename);
            session()->put('image_name', $filename);
        }
    
        Blog::create([
            'title' => $request->title,
            'content' =>$request->content,
            'image' => $path.$filename,
            'status' => $request->status,
        ]);
        return redirect()->route('blog.index')->with('success','Thêm thành công!');
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
    public function edit(Blog $blog)
    {
        return view('Admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' =>'required|unique:blogs,title,'.$blog->id,
            'content' =>'required',
            'image' => 'file|mimes:jpg,jpeg,png,gif',
        ],
        [
            'name.required' => 'Vui lòng điền tiêu đề!',
            'name.unique' => 'Tiêu đề đã tồn tại!',
            'image.file' => 'File ảnh không hợp lệ!',
            'content.required' => 'Vui lòng nhập nội dung',
        ]);
        $filename = NULL;
        $path = NULL;
        // if($request->has('image')){
        //     $file = $request->file('image');
        //     $filename = date('YmdHis').'.'.$file->getClientOriginalExtension();
        //     $path = 'uploads/product/';
        //     $file->move($path,$filename);

        //     if(File::exists($product->image)){
        //         File::delete($product->image);
        //     }
        // }
        $oldImagePath = $blog->image;
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = date('YmdHis').'.'.$extension;

            $path = 'uploads/blog/';
            $file->move($path, $filename);

            if(File::exists($blog->image)){
                File::delete($blog->image);
            }
            $blog->update(['image' => $path.$filename]);
        }
        else {
            // Nếu không có ảnh mới được tải lên, giữ nguyên ảnh cũ
            $blog->update(['image' => $oldImagePath]);
        }
        $blog->update([
            'title' => $request->title,
            'content' =>$request->content,
            'status' => $request->status,
        ]);
        return redirect()->route('blog.index')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if(File::exists($blog->image)){
            File::delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Xóa thành công!');
    }
}
