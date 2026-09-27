<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model { public $timestamps=false; protected $table='order_items'; protected $fillable=['order_id','book_id','title','price','quantity']; protected $casts=['price'=>'decimal:2','quantity'=>'integer']; }