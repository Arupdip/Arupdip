<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Calog extends Model
{
  protected $table = "calogs";

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
