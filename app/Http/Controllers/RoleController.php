<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        return view('roles.index');
    }

    public function create(request $request){
        $validate=$request->validate([
            'name'=>'required|unique:roles,name',
        ]);
        Role::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);
        return view('roles.index');
    }
    public function edit(){
        return view('roles.edit');
    }
    public function show(){
        $roles=Role::all();
        return view('roles.show',compact('roles'));
    }
    public function destroy(){
        return view('roles.destroy');
    }

    public function assign_permission($id){
        $role=Role::find($id);
        $permissions=Permission::all();
        return view('roles.assign_permissions',compact('role','permissions'));
    }

    public function showroles(request $request,$id){
        $user=User::findorFail($id);
        $roles=Role::all();
        return view('roles.role_assign',compact('user','roles'));
    }

 
public function assign(Request $request, $id)
{
    $user = User::findOrFail($id);

    $role = Role::findById($request->role_id); // convert ID → Role

    $user->syncRoles([$role->name]); // assign role properly

    return redirect()->route('users.index');
}
   
}
