<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['category_id','name','phone','address','responsable','email','image','status'];

  protected $table = 'stores';

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Category()
  {
    return $this->belongsTo(Category::class, "category_id");
  }
}
