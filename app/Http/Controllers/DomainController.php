<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    //
    public function domain(Request $request)
    {
    	return view('admin.addDomain');
    }
}
