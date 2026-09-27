<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PointLedger extends Model { public $timestamps=false; protected $table='points_ledger'; protected $fillable=['user_id','event_key','points','label']; }