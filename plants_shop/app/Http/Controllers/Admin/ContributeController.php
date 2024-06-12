<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContributeController extends Controller
{
    public function index()
    {
        $contributes = Contact::orderBy('created_at', 'DESC')->paginate(5);
        return view('Admin.Contribute.index', compact('contributes'));
    }
    public function destroy(Contact $contribute)
    {
 
        $contribute->delete();
 
        return redirect()->route('admin.contributes.index')->with('success', 'Xóa thành công!');
    }
}
