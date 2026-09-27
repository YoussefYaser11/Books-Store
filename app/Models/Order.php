<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model { protected $table='orders'; protected $fillable=['user_id','customer_name','customer_email','whatsapp','address','total','payment_method','payment_reference','status']; protected $casts=['total'=>'decimal:2']; public function items(){return $this->hasMany(OrderItem::class);} public function user(){return $this->belongsTo(User::class);} }