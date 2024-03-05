<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // insert default data
    public function defaultProperty($name, $input){
        $default = array();
        $id_user = Auth::user()->id_user;

        if($input == "add"){
            $user    = "usercreate_".$name;
        }else if($input == "edit"){
            $user    = "userupdate_".$name;
        }

        $default = [
            $user               => $id_user
        ];

        return $default;
    }

    public function get_user($createuser, $updateuser){
        //get create
        $sqlcreate_user = DB::table('user')->select('namalengkap_user');
        $sqlcreate_user->where('id_user',$createuser);
        $create=$sqlcreate_user->first();

        //get update
        $sqlupdate_user = DB::table('user')->select('namalengkap_user');
        $sqlupdate_user->where('id_user',$updateuser==null?'0':$updateuser);
        $update=$sqlupdate_user->first();

        $data_user = array(
            'update'=>$updateuser==null?'0':$update->namalengkap_user,
            'create'=>$create->namalengkap_user);

        return $data_user;
    }
}
