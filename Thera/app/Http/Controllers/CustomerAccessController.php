<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerAccessController extends Controller
{
    // =========ITEMS===============
    public function items_index()
    {

        $products = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->get();
        return view('customerAccess/items.index', ['products'=>$products]);
    }

    public function prodInfo_index()
    {

    }


    public function servInfo_index()
    {

    }
    // ==========ITEMS END============

}
