<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  // 出品中
  const STATE_SELLING = 'selling';
  // 購入済み
  const STATE_BOUGHT = 'bought';

  protected $table = 'item';
  protected $casts = [
    'bought_at' => 'datetime',
  ];

  public function secondaryCategory()
  {
    return $this->belongsTo(SecondaryCategory::class);
  }

  public function seller()
  {
    return $this->belongsTo(User::class, 'seller_id');
  }

  public function condition()
  {
    return $this->belongsTo(ItemCondition::class, 'item_condition_id');
  }

  public function getIsStateSellingAttribute()
  {
    return $this->state === self::STATE_SELLING;
  }
  public function getIsStateBoughtAttribute()
  {
    return $this->state === self::STATE_BOUGHT;
  }
}
