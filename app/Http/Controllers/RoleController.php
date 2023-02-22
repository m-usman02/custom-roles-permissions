<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Str;
class RoleController extends Controller
{

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles'  => 'required|array',
            'roles.*'=> 'exists:roles,id'
        ]);
        try {
           $user = User::find($request->user_id);
           $user->roles()->sync($request->roles);         
           $response = ["success"=>true,"message" => "Role Successfully Assigned !!"]; 
        } catch (\Exception $e) {           
            $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
        }
        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        try {
           $role = new Role;
           $role = $this->save($request,$role);
           $role->permissions()->attach($request->permissions);
           $response = ["success"=>true,"message" => "Role Successfully Added !!"]; 
        } catch (\Exception $e) {           
            $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {          
            $role = $this->save($request,$role);
            $role->permissions()->sync($request->permissions);
            $response = ["success"=>true,"message" => "Role Successfully Updated !!"]; 
         } catch (\Exception $e) {
             $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
         }
         return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {          
            $role->delete();
            $response = ["success"=>true,"message" => "Role Successfully Deleted !!"]; 
         } catch (\Exception $e) {
             $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
         }
         return response()->json($response);
    }

    public function save($request,$role)
    {
      $role->name = $request->name;    
      $role->save();

      return $role;
    }
}
