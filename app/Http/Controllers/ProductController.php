<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;

class ProductController extends Controller
{

  public function index(Request $request)
  {
    $products = Product::get();
    $stores = Store::pluck('name','id');
    $categories = Category::where('type','1')->pluck('name','id');

    return view('products', [
      'products' => $products,
      'stores' => $stores,
      'categories' => $categories,
    ]);
  }

  public function store(Request $request)
  {
    Product::create([
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

  public function edit(Request $request, $id)
  {
    $product = Product::find($id);

    return response()->json([
      'product' => $product,
    ]);
  }

  public function update(Request $request, $id)
  {
    $product = Product::find($id);

    $product->update([
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
    $product = Product::find($id)->delete();

    return response()->json("status", 200);
  }
}
