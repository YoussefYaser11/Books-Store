<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BookRating extends Model { public $timestamps=false; protected $table='book_ratings'; protected $fillable=['book_id','user_id','rating']; protected $casts=['rating'=>'integer']; }