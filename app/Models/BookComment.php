<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BookComment extends Model { public $timestamps=false; protected $table='book_comments'; protected $fillable=['book_id','user_id','body']; protected $casts=['created_at'=>'datetime']; public function user(){return $this->belongsTo(User::class);} }