<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traderlog extends Model
{
  protected $table = "traderlogs";

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }



}
