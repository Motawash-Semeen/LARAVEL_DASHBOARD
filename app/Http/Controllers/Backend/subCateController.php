<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class subCateController extends Controller
{
    public function insert_sub(Request $req){
        $sub = new SubCategory;
        $sub->sub_cat_name = $req->sub_cat_name;
        $sub->sub_cat_des = $req->sub_cat_des;
        $sub->sub_cat_status = $req->sub_cat_status;

        $sub->save();
        return back();
    }

    public function show_sub(){
        $subs= SubCategory::all();

        return view('pages.sub_cate.manage', compact("subs"));
    }

    public function active_sub($id){
        $sub = SubCategory::find($id);
        $sub->sub_cat_status = '1';

        $sub->update();
        return back();
    }

    public function inActive_sub($id){
        $sub = SubCategory::find($id);
        $sub->sub_cat_status = '0';

        $sub->update();
        return back();  
    }

    public function delete_sub($id){
        $sub = SubCategory::find($id);
        $sub->delete();
        return back();
    }

    public function edit_sub( $id){
        $sub = SubCategory::find($id);
        return view ('pages.sub_cate.edit', compact("sub"));
    }

    public function up_sub(Request $req, $id){
        $sub = SubCategory::find($id);
        $sub->sub_cat_name = $req->sub_cat_name;
        $sub->sub_cat_des = $req->sub_cat_des;
        $sub->sub_cat_status = $req->sub_cat_status;

        $sub->update();
        return redirect('/dashboard/showSubCategory');
    }
}
