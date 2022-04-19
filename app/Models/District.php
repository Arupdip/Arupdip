<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

public function state()
{
  return $this->belongsTo('App\Models\State','state_id','state_id');
}
// To get district name from stateid
public static function getDistrictName($districtid){
        
  $district = District::where('id',$districtid)->get();
  return $district[0]->name;

      }
}
