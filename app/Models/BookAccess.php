<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BookAccess extends Model { public $timestamps=false; protected $table='book_access'; protected $fillable=['user_id','book_id','granted_by']; protected $casts=['created_at'=>'datetime']; public function user(){return $this->belongsTo(User::class);} public function book(){return $this->belongsTo(Book::class);} }