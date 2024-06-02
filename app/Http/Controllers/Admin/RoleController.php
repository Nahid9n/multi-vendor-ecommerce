<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view("admin.role.index",compact("roles"));
    }
    public function create()
    {
        return view("admin.role.create");
    }
    public function store(Request $request)
    {
        try{
            $validator=Validator::make($request->all(), [
                "name"  =>"required |unique:roles,name,except,id",
            ]);
            if( $validator->fails() )
            {
                Toastr::error($validator->getMessageBag()->first());
            }
            Role::create([
                "name"=> $request->name,
            ]);
            Toastr::success("Role has been successfully created.");
            return redirect()->route("role.index");
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
    public function assignRole($roleId)
    {
        $role = Role::with('permissions')->find($roleId);
        $role_permission = $role->permissions->pluck('permission_id')->toArray();
        $permissions = Permission::all();
        return view("admin.role.assign.create",
        compact("role","permissions","role_permission"));
    }
    public function rolePermission(Request $request,$roleId)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "permission *"    => "required",
        ]);
        if( $validator->fails() )
        {
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back();
        }
        $role_permissions=RolePermission::where('role_id', $roleId);
        $role_permissions->delete(); // for new role assign
        foreach($request->permission as $permission)
        {
            RolePermission::create([
                "role_id"       => $roleId,
                "permission_id" => $permission
            ]);
        }
        Toastr::success("RolePermission has been successfully created.");
        return redirect()->back();


    }
}
