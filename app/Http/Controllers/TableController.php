<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class TableController extends Controller
{
    public function tableBasic()
    {
        return view('admin.table/tableBasic');
    }
    
    public function tableData()
    {
        return view('admin.table/tableData');
    }
    
}
