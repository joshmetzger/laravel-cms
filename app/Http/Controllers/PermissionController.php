<?php

namespace App\Http\Controllers;
use App\Models\Role; 
use App\Models\Permission; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    //
    public function index(){

        $permissions = Permission::all();

        return view('admin.permissions.index', ['permissions'=>$permissions]);
    }

    public function store(){
        request()->validate([
            'name'=>['required']
        ]);

        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        // Session::flash('permission-created-message', 'Permission Created Succesfully');
        
        return back();
    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission, Request $request){

        // $inputs = request()->validate([
        //     'name'=> ['required', 'string', 'max:255'],
        // ]);

        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');  
        
        if($permission->isDirty('name')){

            Session::flash('permission-updated-message', 'Permission Updated Succesfully: '.$permission->name);

            $permission->save();

        } else {

            Session::flash('permission-updated-message', 'Nothing has been updated');
        }
        
        return back();

    }

    public function destroy(Permission $permission){

        $permission->delete();

        // Session::flash('role-deleted-message', 'Role Deleted Succesfully');

        return back();
    }

}
