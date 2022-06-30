<?php
namespace App\Http\Controllers\Customer\Tutor;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Model\tutor_schedule;
class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(){
		$monday = date('d', strtotime('monday this week'));
		$friday = date('d', strtotime('friday this week'));
        return view('customer.tutor.schedule.index')->with('title','Schedule Time')
		->with('monday',$monday)
		->with('friday',$friday);
    }
	public function fetchweeks(Request $request, $inController = false){
		$monday = date('Y-m-d', strtotime('monday this week'));
		$startDate = date('Y-m-d',strtotime($monday."+".$request->start." Days"));
		$endDate = date('Y-m-d',strtotime($monday."+".$request->end." Days"));
		$begin = new \DateTime($startDate);
		$end = new \DateTime($endDate);
		$arr = [];
		for($t = $begin; $t <= $end; $t->modify('+1 day')){
			$arr[$t->format("Y-m-d")] = [];
			for($i = 8; $i < 19; $i++){
				for($m=0;$m<60;$m+=5){
					$time = ($i<10?'0'.$i:$i).':'.($m<10?'0'.$m:$m);
					$check = tutor_schedule::where('tutor_id',Auth::user()->id)->where('date',$t->format("Y-m-d"))->where('time',$time)->count();
					$arr[$t->format("Y-m-d")][$time] = ($check>0?true:false);
				}
			}
		}
		if($inController===false){
			return response()->json([
				'start' => $startDate,
				'end' => $endDate,
				'data'=>$arr
			]);
		}else{
			return [
				'start' => $startDate,
				'end' => $endDate,
				'data'=>$arr
			];
		}
	}
	public function update(Request $request){
		$monday = date('Y-m-d', strtotime('monday this week'));
		$startDate = date('Y-m-d',strtotime($monday."+".$request->start." Days"));
		$endDate = date('Y-m-d',strtotime($monday."+".$request->end." Days"));
		$begin = new \DateTime($startDate);
		$end = new \DateTime($endDate);
		$arr = [];
		$dayLoop = 1;
		$startTime = ($request->starttime);
		$endTime = ($request->endtime);
		for($t = $begin; $t <= $end; $t->modify('+1 day')){
			if($dayLoop==$request->weekday){
				$date = $t->format("Y-m-d");
				$startTimeObj = new \DateTime($startTime);
				$endTimeObj = new \DateTime($endTime);
				//dd($startTimeObj->diff($endTimeObj));
				for($j = $startTimeObj; $j <= $endTimeObj; $j->modify('+5 minutes')){
					tutor_schedule::where('tutor_id',Auth::user()->id)->where('date',$date)->where('time',$j->format('H:i'))->delete();
					if(!isset($_POST['remove'])){
						$tutor_schedule = new tutor_schedule;
						$tutor_schedule->tutor_id = Auth::user()->id;
						$tutor_schedule->date = $date;
						$tutor_schedule->time = $j->format('H:i');
						$tutor_schedule->save();
					}
				}
			}
			$dayLoop++;
		}
		return response()->json(['status'=>'1']);
	}
	public function copyWeek(Request $request){
		$data = $this->fetchweeks($request, true);
		foreach($data['data'] as $datk=>$dat){
			$date = date('Y-m-d',strtotime($datk."+7 Days"));
			tutor_schedule::where('tutor_id',Auth::user()->id)->where('date',$date)->delete();
			foreach($dat as $dak=>$da){
				if($da===true){
					$tutor_schedule = new tutor_schedule;
					$tutor_schedule->date = $date;
					$tutor_schedule->tutor_id = Auth::user()->id;
					$tutor_schedule->time = $dak;
					$tutor_schedule->save();
				}
			}
		}
		return response()->json(['status'=>'1']);
	}
}
