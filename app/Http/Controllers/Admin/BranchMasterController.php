<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchMasterController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->paginate(10);
        $branches->appends(['sort' => 'id']);
        return view('admin.branch.index',compact('branches'));
    }
    public function add()
    {
        return view('admin.branch.add');
    }
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.branch.edit',compact('branch'));
    }
    public function delete($id)
    {
        Branch::find($id)->delete();
        return redirect()->back()->with('success','Branch deleted Successfully');
    }
}
