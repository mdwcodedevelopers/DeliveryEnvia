<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Store;

class StoreController extends Controller
{
  public function index(Request $request)
  {
    $stores = Store::get();
    $categories = Category::where('type','1')->pluck('name','id');

    return view('stores', [
      'stores' => $stores,
      'categories' => $categories,
    ]);
  }

  public function store(Request $request)
  {
    Store::create([
      'category_id' => $request->category_id,
      'name' => $request->name,
      'phone' => $request->phone,
      'address' => $request->address,
      'responsable' => $request->responsable,
      'email' => $request->email,
      'image' => $request->image,
      'status' => $request->status,
    ]);

    return response()->json("status", 200);
  }

  public function edit(Request $request, $id)
  {
    $store = Store::find($id);

    return response()->json([
      'store' => $store,
      'status' =>  200
    ]);
  }

  public function update(Request $request, $id)
  {
    $store = Store::find($id);

    $store->update([
      'category_id' => $request->category_id,
      'store_id' => $request->store_id,
      'code' => $request->code,
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
      'image' => $request->image,
      'status' => $request->status,
    ]);

    return response()->json("status", 200);
  }

  public function destroy($id)
  {
    $store = Store::find($id)->delete();

    return response()->json("status", 200);
  }
}
