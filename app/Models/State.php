<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;



// To get sate name from stateid
  public static function getStateName($stateid){
        
        $state = State::where('state_id',$stateid)->get();
        return $state[0]->state_title;

            }
}
