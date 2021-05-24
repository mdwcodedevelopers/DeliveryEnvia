<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Role::Create([
      'name' => 'admin',
      'description' => 'Administrador',
      'status' => '1',
    ]);

    Role::Create([
      'name' => 'delivery',
      'description' => 'Repartidor',
      'status' => '1',
    ]);
  }
}
