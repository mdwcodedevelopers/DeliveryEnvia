<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_detail extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = ['order_id','product_id','name','quantity','price','subtotal','amount'];

  protected $table = 'orders_details';

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Order()
  {
    return $this->belongsTo(Order::class, "order_id");
  }

  public function Product()
  {
    return $this->belongsTo(Product::class, "product_id");
  }

}
