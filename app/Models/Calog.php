<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calog extends Model
{
  protected $table = "calogs";

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }



}
