<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Publisher extends Model { public $timestamps=false; protected $table='publishers'; protected $fillable=['name']; public function books(){return $this->hasMany(Book::class);} }