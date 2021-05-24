<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Company::Create([
      'name' => 'Envia2Go',
      'address' => 'Zona Centro',
      'phone' => '+58000000000',
      'email' => 'contact@envia2go.com',
      'website' => 'envia2go.com',
    ]);
  }
}
