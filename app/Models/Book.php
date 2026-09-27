<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Book extends Model {
 public $timestamps=false; protected $table='books';
 protected $fillable=['title','author','description','price','rating','image','stock','category_id','publisher_id','purchase_location'];
 protected $casts=['price'=>'decimal:2','rating'=>'decimal:1','stock'=>'integer'];
 public function category(){return $this->belongsTo(Category::class);}
 public function publisher(){return $this->belongsTo(Publisher::class);}
 public function comments(){return $this->hasMany(BookComment::class);}
 public function ratings(){return $this->hasMany(BookRating::class);}
}