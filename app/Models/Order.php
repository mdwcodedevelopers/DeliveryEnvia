<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['user_id','fullname','maps_address','delivery_date','amount'];

  protected $table = 'orders';

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Details()
  {
    return $this->hasMany(Order_detail::class, "order_id");
  }

}
