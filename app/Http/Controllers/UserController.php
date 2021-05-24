<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

  public function index(Request $request)
  {
    $users = User::get();
    $roles = Role::pluck('name','id');

    return view('users', [
      'users' => $users,
      'roles' => $roles
    ]);
  }

  public function store(Request $request)
  {
    User::create([
      'role_id' => $request->role_id,
      'name' => $request->name,
      'address' => $request->address,
      'phone' => $request->phone,
      'email' => $request->email,
      'image' => $request->image,
      'password' => Hash::make('12345678'),
      'status' => $request->status,
    ]);

    return response()->json("status", 200);
  }

  public function edit(Request $request, $id)
  {
    $user = User::find($id);

    return response()->json([
      'user' => $user,
    ]);
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);

    $user->update([
      'role_id' => $request->role_id,
      'name' => $request->name,
      'address' => $request->address,
      'phone' => $request->phone,
      'email' => $request->email,
      'image' => $request->image,
      'password' => Hash::make('12345678'),
      'status' => $request->status,
    ]);

    return response()->json("status", 200);
  }

  public function destroy($id)
  {
    $user = User::find($id)->delete();

    return response()->json("status", 200);
  }
}
