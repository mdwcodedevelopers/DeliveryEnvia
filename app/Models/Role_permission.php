<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
  use HasFactory;

  protected $fillable = ['role_id','permission_id'];

  protected $table = 'role_permissions';


  public function Roles()
  {
    return $this->hasMany(Role::class, "role_id");
  }

  public function Permissions()
  {
    return $this->hasMany(Permission::class, "permission_id");
  }
}
