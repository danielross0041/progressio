<?php
namespace App\Http\Controllers\Customer\Teacher;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\{bookings, transactions};
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function buycoin(){
		if(!empty($_GET['coin'])){
			//stripe redirect here
			transactions::create([
				'user_id'=>Auth::user()->id,
				'coin'=>intval($_GET['coin']),
				'reason_for_transaction'=>Auth::user()->name.' purchased coin',
				'is_debit'=>1,
			]);
			return redirect()->route('teacher.buycoin')->with('notify_success','Coins Added in your Account');
		}
        return view('customer.teacher.buycoin')->with('title','Buy Coins');
    }
}