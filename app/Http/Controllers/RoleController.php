<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Role;
use Carbon\Carbon;
use Str;

class RoleController extends Controller
{
    //
    public function roleuser(){
        $data=role::all();
        return view('role.add',compact('data'));
    }
    
    public function userrole(Request $request)
    {
        $request->validate(['role'=> 'required', ]);
        $role = Str::upper($request->role);
        
        if(Role::Where('role','=',$role)->doesntExist()){
            Role::insert([
                'role'=>$role,
                'created_at'=> Carbon::now(),
            ]);
           
        }
        else{
            return back()->with('InsErr','Already inserted !');

        }
     return back();
    }
}
