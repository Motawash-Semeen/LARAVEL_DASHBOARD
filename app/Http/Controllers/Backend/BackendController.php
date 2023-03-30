<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{


    public function item(){
        return view('pages.item.add');
    }

    public function Cate(){
        return view('pages.category.add');
    }
    

    public function Sub_Cate(){
        return view('pages.sub_cate.add');
    }
    
}
