<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['name','display_name','description','status'];

  protected $table = 'permissions';

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Roles()
  {
    return $this->hasMany(Role_permission::class, "permission_id")->orderBy('name','ASC');
  }
}
