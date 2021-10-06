<?php

namespace App\Http\Controllers;
use App\Models\Role; 
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

    public function destroy(Role $role){
        
        $role->delete();

        Session::flash('role-deleted-message', 'Role Deleted Succesfully');

        return back();
    }
}
