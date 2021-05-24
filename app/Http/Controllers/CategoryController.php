<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{

  public function index(Request $request)
  {
    $categories = Category::get();

    return response()->json([
      'categories' => $categories,
    ]);
  }

  public function create(Request $request)
  {
    Category::create([
      'code' => $request->code,
      'name' => $request->name,
      'description' => $request->description,
      'image' => $request->image,
      'type' => $request->type,
    ]);

    return response()->json("success", 200);
  }

  public function edit(Request $request, $id)
  {
    $category = Category::find($id);

    return response()->json([
      'category' => $category,
    ]);
  }

  public function update(Request $request, $id)
  {
    $category = Category::find($id);

    $category->update([
      'code' => $request->code,
      'name' => $request->name,
      'description' => $request->description,
      'image' => $request->image,
      'type' => $request->type,
    ]);

    return response()->json("success", 200);
  }

  public function destroy($id)
  {
    $category = Category::find($id)->delete();

    return response()->json("success", 200);
  }
}
