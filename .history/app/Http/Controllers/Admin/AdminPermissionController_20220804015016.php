<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function create()
    {
        return view('admin.permissions.create');
    }
    public function store(Request $request)
    {
       $permissions = Permission::create([
        'name'=> $request->module_parent,
        'display_name'=> $request->module_parent,
        'parent_id' => 0,
       ]);
    }
}
