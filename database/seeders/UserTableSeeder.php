<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    User::Create([
      'role_id' => 1,
      'name' => 'Administrador General',
      'address' => 'Zona Centro',
      'phone' => '8991237754',
      'email' => 'super@admin.com',
      'password' => Hash::make('12345678'),
      'status' => 'active',
    ]);
  }
}






