<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
  public function primaryCategory()
  {
    return $this->belongsTo(PrimaryCategory::class);
  }
}
