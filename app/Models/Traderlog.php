<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Traderlog extends Model
{
  protected $table = "traderlogs";

  protected static function boot()
  {
      parent::boot();
   
      // Order by name ASC
      static::addGlobalScope('order', function (Builder $builder) {
          $builder->orderBy('id', 'desc');
      });
  }


  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }



}
