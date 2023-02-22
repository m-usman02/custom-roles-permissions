<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Str;
class PermissionController extends Controller
{
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
    public function store(PermissionRequest $request)
    {
        try {
           $permission = new Permission;
           $permission = $this->save($request,$permission);
           $response = ["success"=>true,"message" => "Permission Successfully Added !!"]; 
        } catch (\Exception $e) {
            $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        try {          
            $this->save($request,$permission);
            $response = ["success"=>true,"message" => "Permission Successfully Updated !!"]; 
         } catch (\Exception $e) {
             $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
         }
         return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        try {          
            $permission->delete();
            $response = ["success"=>true,"message" => "Permission Successfully Deleted !!"]; 
         } catch (\Exception $e) {
             $response = ["success"=>false,"message" => "Something Went Wrong !!"];    
         }
         return response()->json($response);
    }

    public function save($request,$permission)
    {
      $permission->name = $request->name;      
      $permission->save();

      return $permission;
    }
}
