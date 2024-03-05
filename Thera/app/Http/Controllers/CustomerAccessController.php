<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAccessController extends Controller
{
    // =========ITEMS===============
    public function items_index()
    {
        return view('customerAccess/items.index');
    }

    public function prodInfo_index()
    {

    }


    public function servInfo_index()
    {

    }
    // ==========ITEMS END============

}
