<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function columnChart()
    {
        return view('admin.chart/columnChart');
    }
    
    public function lineChart()
    {
        return view('admin.chart/lineChart');
    }

    public function pieChart()
    {
        return view('admin.chart/pieChart');
    }
}
