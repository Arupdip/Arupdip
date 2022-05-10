<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CAApply extends Model
{
	protected $table = "ca_apply";

	protected static function boot()
    {
        parent::boot();
     
        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }


	public function partners()
	{
		
  return $this->hasMany('App\Models\CaPartners','ca_apply_id'); 
	}


	public function state()
	{
		return $this->belongsTo('App\Models\State','state_id', 'state_id');
	}

	public function district()
	{
		return $this->belongsTo('App\Models\District','district_id');
	}

	public function amc()
	{
		return $this->belongsTo('App\Models\AMC','amc_id');
	}

	public function liscencetype()
	{
		return $this->belongsTo('App\Models\Licensetype','liscencetype_id');
	}


	public function user()
	{
		return $this->belongsTo('App\Models\User','user_id');
	}
}
