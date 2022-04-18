<?php 

    use Illuminate\Support\Facades\DB;

    function user_roll($id=''){
       return DB::table('users_type')->where('id',$id)->first()->name;
    }

?>