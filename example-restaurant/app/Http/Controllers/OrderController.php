<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function get_customer_name($menu_name){
        $customers = DB::table('customers')    
        ->join('orders', 'customers.id', '=', 'orders.customer_id')    
        ->join('order_items', 'order_items.order_id', '=', 'orders.order_id')    
        ->join('menus', 'order_items.menu_id', '=', 'menus.menu_id')    
        ->where('menus.name', $menu_name)    
        ->select('customers.name')    
        ->get();    
        return view('customer_table', ['customers' => $customers]); 
    }

    public function count_menus()  {    
        $menus = DB::table('menus')      
        ->select(DB::raw('count(*) as menu_count, category_id'))      
        ->groupBy('category_id')      
        ->get();      
        return $menus;  
    }

    public function list_menus()  {    
        $menus = DB::table('menus')      
        ->orderBy('name', 'ASC')      
        ->orderBy('price', 'ASC')      
        ->get();      
        return $menus;  
    }

    public function high_price() {
        $menus = DB::table('customers as c')
        ->join('orders as o', 'c.id', '=', 'o.customer_id')
        ->join('order_items as oi', 'oi.order_id', '=', 'o.order_id')
        ->join('menus as m', 'oi.menu_id', '=', 'm.menu_id')
        ->where('m.menu_id', function ($query) {
            $query->select('menu_id')
                ->from('menus')
                ->where('price', '=', function ($subquery) {
                    $subquery->selectRaw('MAX(price)')
                        ->from('menus');
                });
        })
        ->select('c.*', 'o.*', 'oi.*', 'm.*')
        ->get();

        $name = DB::table('customers as c')
        ->join('orders as o', 'c.id', '=', 'o.customer_id')
        ->join('order_items as oi', 'oi.order_id', '=', 'o.order_id')
        ->join('menus as m', 'oi.menu_id', '=', 'm.menu_id')
        ->where('m.menu_id', function ($query) {
            $query->select('menu_id')
                ->from('menus')
                ->where('price', '=', function ($subquery) {
                    $subquery->selectRaw('MAX(price)')
                        ->from('menus');
                });
        })
        ->select('c.*')
        ->get();
        
        return view('high_price', ['menus' => $menus, 'name' => $name]);
    } 
}


