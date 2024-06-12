<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('created_at', 'DESC')->paginate(5);
        return view('Admin.Category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:categories',
            'type' => 'required|in:0,1',
        ],
        [
            'name.required' => 'Vui lòng điền tên danh mục!',
            'type.required' => 'Vui lòng chọn loại cây hoặc hoa!',
        ]);
        $data = $request->all('name','status','type');
        Category::create($data);
        return redirect()->route('category.index')->with('success','Thêm thành công!');
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
    public function edit(Category $category)
    {
        return view('Admin.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' =>'required|unique:categories,name,'.$category->id,
        ],
        [
            'name.required' => 'Vui lòng điền tên danh mục!',
        ]);
        $data = $request->all('name','status','type');
        $category -> update($data);
        return redirect()->route('category.index')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
 
        $category->delete();
 
        return redirect()->route('category.index')->with('success', 'Xóa thành công!');
    }
}
