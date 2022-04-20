<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraderApply extends Model
{
	protected $table = "trader_apply";

	public function state()
	{
		return $this->belongsTo('App\Models\State','state_id', 'state_id');
	}

	public function district()
	{
		return $this->belongsTo('App\Models\District','district_id');
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
