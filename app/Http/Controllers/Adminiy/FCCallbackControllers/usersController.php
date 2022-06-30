<?php
namespace App\Http\Controllers\Adminiy\FCCallbackControllers;
use App\Http\Controllers\Controller;
use Helper;
use App\Model\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class usersController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('v',config('app.vadminiy'));
        View()->share('favicon',$favicon);
    }
    public function beforeInsert($inputs){
        if(strlen($inputs['password'])<60){
            $inputs['password']=Hash::make($inputs['password']);
        }
		return $inputs;
    }
	// public function afterInsert($model){
	// 	$m_flag=m_flag::find($model->id);
	// 	$m_flag->user_id=0;
	// 	$m_flag->save();
	// }
	// public function beforeDelete($table,$id,$col){
	// 	/*before deleting record*/
	// }
	// public function afterDelete($table,$id,$col){
	// 	/*after deleting record*/
	// }
}
