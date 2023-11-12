<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB; 
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View  {    
        $users = DB::table('users')->get();    
        return view('user.index', ['users' => $users]);  
    }

    public function getnames(): View { 
        $names = DB::table('users')->pluck("name"); 
        return view('customers-names', ['names' => $names]); 
    }
    public function getCustomerEmail(Request $request)  {    
        $name = $request->input('name');    
        $customer = DB::table('users')->where('name', $name)->first();    
        return view('customer-email')->with('customer', $customer);  
    }
}
