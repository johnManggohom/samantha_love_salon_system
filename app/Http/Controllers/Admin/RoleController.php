<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
      $user=Auth::user();
        $roles = Role::whereNotIn('name',['admin'])->get();
        return view('admin.roles.index', compact('roles', 'user') );
        
    }

       public function create(){
      return view('admin.roles.create');
    }



    public function store(Request $request){
        $validated = $request->validate(['name'=>['required', 'min:3']]);

        

        if(Role::where('name',$validated)->count() == 0 ){
          Role::create($validated);
              return to_route('admin.roles.index');
          }else{
            return to_route('admin.roles.index');
          }




    
    }


 public function edit(Role $role){
      $permissions = Permission::all();
      return view('admin.roles.edit', compact('role','permissions'));
    }
public function update(Request $request, Role $role){
  $validated = $request->validate(['name'=>'required']);
  $role->update($validated);

   return to_route('admin.roles.index')->with('message', 'role updated succesfully');

}

public function destroy(Role $role){

  $role->delete();
  return back()->with('message', 'role delete');

}


public function givePermission(Request $request, Role $role){
  if($role->hasPermissionTo($request->permission)){
    return back()->with('message', 'permission exist');
  }
   
  $role->givePermissionTo($request->permission);
  return back()->with('message', 'permission added');

}


public function revokePermission(Role $role, Permission $permission){
  if($role->hasPermissionTo($permission)){
    $role->revokePermissionTo($permission);
      return back()->with('message', 'permission revoke');
  }
  return back()->with('message', 'permission not exist');
}
}
