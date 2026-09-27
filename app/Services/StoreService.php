<?php
namespace App\Services;
use App\Models\PointLedger;
class StoreService {
 public static function awardPoints(int $userId,string $eventKey,int $points,string $label):void {
  if($userId<1||$points<1)return;
  PointLedger::firstOrCreate(['user_id'=>$userId,'event_key'=>$eventKey],['points'=>$points,'label'=>$label]);
 }
 public static function cartCount():int{return array_sum(array_map('intval',session('cart',[])));}
 public static function bookImage(?string $image):string{return $image?asset('storage/'.$image):asset('assets/book-placeholder.svg');}
}