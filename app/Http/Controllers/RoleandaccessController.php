<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class RoleandaccessController extends Controller
{
    public function assignRole()
    {
        return view('admin.roleandaccess/assignRole');
    }
    
    public function roleAaccess()
    {
        return view('admin.roleandaccess/roleAaccess');
    }
}
