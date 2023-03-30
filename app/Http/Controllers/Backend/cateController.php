<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class cateController extends Controller
{
    public function insertCate(Request $request){
        $categories = new Category;
        $categories->cat_name = $request->cat_name;
        $categories->cat_description = $request->cat_des;
        $categories->cat_status = $request->cat_status;

        $categories->save();
        return back();
    }

    public function showCate(){
        $categories = Category::all();
        return view('pages.category.manage', compact("categories"));
    }

    public function activeCate($id){
        $categories = Category::find($id);
        $categories->cat_status = '1';

        $categories->update();
        return back();
    }
    public function inactiveCate($id){
        $categories = Category::find($id);
        $categories->cat_status = '0';

        $categories->update();
        return back();
    }

    public function deleteCate($id){
        $category = Category::find($id);
        $category->delete();
        return back();
    }

    public function editCate($id){
        $category = Category::find($id);
        return view('pages.category.edit', compact("category"));
    }

    public function upCate(Request $request,$id){
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->cat_description = $request->cat_des;
        $category->cat_status = $request->cat_status;

        $category->update();
        return redirect('/dashboard/manageCategory');
    }
}
