<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['name','description','status'];

  protected $table = 'roles';

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Users()
  {
    return $this->hasMany(User::class, "role_id")->orderBy('name','ASC');
  }

  public function Permissions()
  {
    return $this->hasMany(Role_permission::class, "role_id")->orderBy('role_id','ASC');
  }
}
