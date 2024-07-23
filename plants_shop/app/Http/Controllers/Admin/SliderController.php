<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('Admin.Slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif',
            'order' => 'required|integer|unique:sliders',
        ],
        [
            'title.required' => 'Vui lòng nhập tiêu đề!',
            'order.required' => 'Vui lòng nhập thứ tự!',
            'order.integer' => 'Vui lòng nhập thứ tự!',
            'order.unique' => 'Số thứ tự vừa nhập đang có trong hệ thống!',
            'image.file' => 'File ảnh không hợp lệ!',
            'image.required' => 'Vui lòng chọn ảnh!',
        ]);
        $filename = NULL;
        $path = NULL;

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = date('YmdHis').'.'.$extension;

            $path = 'uploads/sliders/';
            $file->move($path, $filename);
            session()->put('image_name', $filename);
        }
    
        Slider::create([
            'title' => $request->title,
            'order' => $request->order,
            'image' => $path.$filename,
            'status' => $request->status,
        ]);
        return redirect()->route('slider.index')->with('success','Thêm thành công!');
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
    public function edit(Slider $slider)
    {
        return view('Admin.Slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png,gif',
            'order' => 'required|unique:sliders,order,'.$slider->id,
        ],
        [
            'title.required' => 'Vui lòng nhập tiêu đề!',
            'order.required' => 'Vui lòng nhập thứ tự!',
            'order.integer' => 'Vui lòng nhập thứ tự!',
            'order.unique' => 'Số thứ tự vừa nhập đang có trong hệ thống!',
            'image.file' => 'File ảnh không hợp lệ!',
        ]);
        $oldImagePath = $slider->image;
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = date('YmdHis').'.'.$extension;

            $path = 'uploads/sliders/';
            $file->move($path, $filename);

            if(File::exists($slider->image)){
                File::delete($slider->image);
            }
            $slider->update(['image' => $path.$filename]);
        }
        else {
            // Nếu không có ảnh mới được tải lên, giữ nguyên ảnh cũ
            $slider->update(['image' => $oldImagePath]);
        }
        $slider->update([
            'title' => $request->title,
            'order' => $request->order,
            'status' => $request->status,
        ]);
        return redirect()->route('slider.index')->with('success','Cập nhật thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        
        if(File::exists($slider->image)){
            File::delete($slider->image);
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success','Xóa thành công!');
    }
}
