<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index(){
        return view('permissions.index');
    }
    public function create(){
        return view('permissions.create');
    }
    public function store(request $request){
        $validate=$request->validate([
            'name'=>'required|unique:permissions,name'
        ]);
        Permission::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);

        return view('permissions.create');
    }
    public function assign(request $request,$id){
        $role=Role::find($id);
        $role->syncPermissions($request->permissions??[]);
        return redirect()->route('roles.show');
    }
}
