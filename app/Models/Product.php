<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['category_id','store_id','code','name','description','price','image','status'];

  protected $table = 'products';

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

  public function Store()
  {
    return $this->belongsTo(Store::class, "store_id");
  }

  public function Details()
  {
    return $this->hasMany(Order_detail::class, "product_id");
  }
}
