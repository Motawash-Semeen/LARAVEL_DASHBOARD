<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class itemController extends Controller
{
    public function insert(Request $request){
        $items = new Item;
        $items->item_name = $request->item_name;
        $items->item_description = $request->item_des;
        $items->item_price = $request->item_price;
        $items->item_quantity = $request->item_quantity;
        $items->item_status = $request->status;
        $items->save();
        return back();
    }
    public function show(){
        $items = Item::all();
        return view('pages.item.manage', compact("items"));
    }
    public function itemActive($id){
        $items = Item::find($id);
        $items->item_status = '1';
        $items->update();
        return back();
    }
    public function itemInactive($id){
        $items = Item::find($id);
        $items->item_status = '0';
        $items->update();
        return back();
    }
    public function itemDelete($id){
        $items = Item::find($id);
        $items->delete();
        return back();
    }

    public function edit($id){
        $item = Item::find($id);

        return view('pages.item.edit', compact("item"));
    }

    public function update(Request $request, $id){
        $item = Item::find($id);
        $item->item_name = $request->item_name;
        $item->item_description = $request->item_des;
        $item->item_price = $request->item_price;
        $item->item_quantity = $request->item_quantity;
        $item->item_status = $request->status;

        $item->update();
        return redirect('/dashboard/managetItem');
    }
}
