<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{   
    function __construct()
    {
        $this->middleware('auth');
    }
    public function documentary_stamp()
    {
        return view('help/documentary_stamp');
    }
    public function excise()
    {
        return view('help/excise');
    }
    public function income()
    {
        return view('help/income');
    }
    public function onett()
    {
        return view('help/onett');
    }
    public function payment()
    {
        return view('help/payment');
    }
    public function percentage()
    {
        return view('help/percentage');
    }
    public function value_added_tax()
    {
        return view('help/value_added_tax');
    }
    public function withholding()
    {
        return view('help/withholding');
    }
}
