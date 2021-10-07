<?php

namespace App\Http\Controllers;
use App\Models\Role; 
use App\Models\Permission; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    //

    public function index(){

        $roles = Role::all();

        return view('admin.roles.index', ['roles'=>$roles]);
    }

    public function store(Request $request){
        
        request()->validate([
            'name'=>['required']
        ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        Session::flash('role-created-message', 'Role Created Succesfully');
        
        return back();
    }

    public function edit(Role $role){

        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);

    }

    public function update(Role $role, Request $request){

        // $inputs = request()->validate([
        //     'name'=> ['required', 'string', 'max:255'],
        // ]);

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');  
        
        if($role->isDirty('name')){

            Session::flash('role-updated-message', 'Role Updated Succesfully: '.$role->name);

            $role->save();

        } else {

            Session::flash('role-updated-message', 'Nothing has been updated');
        }
        
        return back();

    }

    public function attach_permission(Role $role){

        $role->permissions()->attach(request('permission'));

        return back();

    }

    public function detach_permission(Role $role){

        $role->permissions()->detach(request('permission'));

        return back();

    }

    public function destroy(Role $role){
        
        $role->delete();

        Session::flash('role-deleted-message', 'Role Deleted Succesfully');

        return back();
    }
}
