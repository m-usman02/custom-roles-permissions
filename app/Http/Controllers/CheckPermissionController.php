<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckPermissionController extends Controller
{
    public function checkCreatePermission()
    {    
        $response = ['success'=>true];           
        if(!auth()->user()->can('create'))
        {
            $response = ['success'=>false];
        }
        return response()->json($response);
        
    }

    public function checkUpdatePermission()
    {
        $response = ['success'=>true];
        if(!auth()->user()->can('update'))
        {
            $response = ['success'=>false];
        }
        return response()->json($response);
        
    }

    public function checkViewPermission()
    {
        $response = ['success'=>true];
        if(!auth()->user()->can('view'))
        {
            $response = ['success'=>false];
        }
        return response()->json($response);
        
    }

    public function checkDeletePermission()
    {
        $response = ['success'=>true];
        if(!auth()->user()->can('delete'))
        {
            $response = ['success'=>false];
        }
        return response()->json($response);
        
    }
}
