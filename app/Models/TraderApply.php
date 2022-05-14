<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TraderApply extends Model
{
	protected $table = "trader_apply";


	protected static function boot()
    {
        parent::boot();
     
        // Order by name ASC
       if(Auth::check() && (Auth::user()->user_type ==3 || Auth::user()->user_type ==4 || Auth::user()->user_type ==5 ))
       {
       	$amc_list = explode(',',Auth::user()->amc_list);
        static::addGlobalScope('order', function (Builder $builder) use ($amc_list) {
            $builder->whereIn('amc_id',$amc_list)->orderBy('id', 'desc');
        });
    	}
    	else
    	{
    		 static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    	}
    }


	public function state()
	{
		return $this->belongsTo('App\Models\State','state_id', 'state_id');
	}

	public function firmstate()
	{
		return $this->belongsTo('App\Models\State','firm_state_id', 'state_id');
	}

	public function district()
	{
		return $this->belongsTo('App\Models\District','district_id');
	}

	public function firmdistrict()
	{
		return $this->belongsTo('App\Models\District','firmdistrict_id','id');
	}

	public function mandal()
	{
		return $this->belongsTo('App\Models\Mandal','mandal_id');
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
