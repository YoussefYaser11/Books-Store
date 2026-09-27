<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable {
 use Notifiable;
 public $timestamps=false; protected $table='users';
 protected $fillable=['name','email','password','role'];
 protected $hidden=['password','remember_token'];
 protected function casts(): array { return ['password'=>'hashed']; }
 public function isAdmin(): bool { return $this->role === 'admin'; }
 public function pointsLedger(){ return $this->hasMany(PointLedger::class); }
}