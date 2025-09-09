<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceAdd()
    {
        return view('admin.invoice/invoiceAdd');
    }
    
    public function invoiceEdit()
    {
        return view('admin.invoice/invoiceEdit');
    }
    
    public function invoiceList()
    {
        return view('admin.invoice/invoiceList');
    }
    
    public function invoicePreview()
    {
        return view('admin.invoice/invoicePreview');
    }
    
}
