<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AMC extends Model
{
   protected $table = "amc";

       public function district()
{
  return $this->belongsTo('App\Models\District','district_id');
}


}
