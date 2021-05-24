<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
  public function edit(Request $request, $id)
  {
    $company = Company::find($id);

    return view('companies', [
      'company' => $company,
    ]);
  }

  public function update(Request $request, $id)
  {
    $company = Company::find($id);

    $company->update([
      'name' => $request->name,
      'address' => $request->address,
      'phone' => $request->phone,
      'image' => $request->image,
      'email' => $request->email,
      'website' => $request->website,
    ]);

    return response()->json("status", 200);
  }
}
