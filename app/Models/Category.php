<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['code','name','description','image','type'];

  protected $table = 'categories';

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Products()
  {
    return $this->hasMany(Product::class, "category_id");
  }

  public function Stores()
  {
    return $this->hasMany(Store::class, "category_id");
  }
}
