<?php
namespace App\Http\Controllers\Customer\School;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\{User, m_flag};
use DB;
use Session;
use App\Model\tutor_schedule;
use Illuminate\Http\Request;
use App\Http\Requests\bookingRequest;
use App\Model\{bookings, booking_pupils};
class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function purchase(){
        return view('customer.school.lesson.purchase')->with('title','Purchase Lesson');
    }
    public function book(){
		$pupils = User::where('user_type',2)->where('school_id',Auth::user()->id)->orderBy('id','asc')->get();
		$universities=m_flag::where('is_active',1)->where('flag_type','TUTORUNIVERSITIES')->get();
		$subjects=m_flag::where('is_active',1)->where('flag_type','SUBJECTS')->get();
        return view('customer.school.lesson.book')->with('title','Book Lesson')
		->with(compact('universities','subjects','pupils'));;
    }
	public function getResults(Request $request){
		$date = $request->start_date;
		$time = $request->start_time;
		$subject_id = $request->subject;
		$users = User::where('user_type',3)->where('is_active',1)
		->select('users.id','users.email','users.profile_image','users.name','tutor_subjects.subject_id',DB::raw('0 as showSchedule'))
		->rightJoin('tutor_schedule',function($join) use ($date, $time) {
			$join->on('users.id', '=', 'tutor_schedule.tutor_id')
			->where('date',$date)->where('time',$time);
		})
		->rightJoin('tutor_subjects',function($join) use ($subject_id){
			$join->on('users.id', '=', 'tutor_subjects.tutor_id')
			->where('tutor_subjects.subject_id', $subject_id);
		})
		->orderBy('users.id','asc')->with('tutordetail','tutorsubjects')->get();
		return response()->json($users);
	}
	public function getSchedule(Request $request){
		$tutor_id = $request->tutor_id;
		$start_date = $request->start_date;
		$arr = [];
		for($i = 8; $i < 19; $i++){
			for($m=0;$m<60;$m+=15){
				$time = ($i<10?'0'.$i:$i).':'.($m<10?'0'.$m:$m);
				$check = tutor_schedule::where('tutor_id',$tutor_id)->where('date',$start_date)->where('time',$time)->count();
				$arr[$time] = ($check>0?true:false);
			}
		}
		return response()->json($arr);
	}
	public function calculatePrice(Request $request){
		$tutor_id = $request->tutor_id;
		$book_from_time = $request->book_from_time;
		$book_to_time = $request->book_to_time;
		$user = User::find($tutor_id);
		if($user->id!=''){
			$perHour = $user->tutordetail->per_hour_price;
			if(count($request->pupils)==1){
				$perHour=10;
			}
			if(count($request->pupils)==2){
				$perHour=13;
			}
			if(count($request->pupils)==3){
				$perHour=15;
			}
			if($perHour>0){
				$begin = new \DateTime($book_from_time);
				$end = new \DateTime($book_to_time);
				if($end->getTimestamp()>$begin->getTimestamp()){
					$difference = $begin->diff($end);
					$minutes = $difference->i;
					$hours = $difference->h;
					$price = ($hours*$perHour);
					if($minutes>0){
						$per_minute_cost = $perHour/60;
						$price+=($per_minute_cost*$minutes);
					}
					return response()->json(['status'=>'1', 'data'=>[
						'price' => $price,
						'hours' => ($hours+($minutes/60)),
					]]);
				}
			}
		}
		return response()->json(['status'=>'0']);
	}
	public function updateBookingSession(Request $request){
		$cart = [];
		if(Session::has('cart')){
			$cart = Session::get('cart');
		}
		$cart[] = [
			'tutor_id'=>$request->tutor_id,
			'book_from_time'=>$request->book_from_time,
			'book_to_time'=>$request->book_to_time,
			'pupils'=>$request->pupils,
			'booking_date'=>$request->booking_date,
			'subject_id'=>$request->subject_id,
		];
		Session::put('cart',$cart);
		return response()->json(['status'=>'1']);
	}
	public function provideDetails(){
		if(Session::has('cart')){
			$cart = Session::get('cart');
			if(count($cart)>0){
				$data = $cart[(count($cart)-1)];
				return view('customer.school.lesson.bookingDetails')->with('title','Provide Booking Request Details')
				->with('data',$data);
			}
		}
	}
	public function finalizeBooking(bookingRequest $request){
		if(Session::has('cart')){
			$cart = Session::get('cart');
			if(count($cart)>0){
				$data = $cart[(count($cart)-1)];
				$tutor_id = $data['tutor_id'];
				$book_from_time = $data['book_from_time'];
				$book_to_time = $data['book_to_time'];
				$booking_date = $data['booking_date'];
				$subject_id = $data['subject_id'];
				$pupils = $data['pupils'];
				$tutor = User::find($tutor_id);
				$perHour = $tutor->tutordetail->per_hour_price;
				$begin = new \DateTime($book_from_time);
				$end = new \DateTime($book_to_time);
				$difference = $begin->diff($end);
				$minutes = $difference->i;
				$hours = $difference->h;
				$price = ($hours*$perHour);
				if($minutes>0){
					$per_minute_cost = $perHour/60;
					$price+=($per_minute_cost*$minutes);
				}
				$booking = bookings::create([
					'tutor_id'=>$tutor_id,
					'date'=>$booking_date,
					'from_time'=>$book_from_time,
					'to_time'=>$book_to_time,
					'subject_id'=>$subject_id,
					'total'=>$price,
					'teacher_id' => Auth::user()->id,
				]);
				foreach($pupils as $pupil){
					$pupil_current_grade = $request->pupil_current_grade[$pupil];
					$pupil_target_grade = $request->pupil_target_grade[$pupil];
					$exam_board = $request->exam_board[$pupil];
					$advice = $request->advice[$pupil];
					$notes = $request->notes[$pupil];
					booking_pupils::create([
						'booking_id'=>$booking->id,
						'pupil_id'=>$pupil,
						'current_grade'=>$pupil_current_grade,
						'target_grade'=>$pupil_target_grade,
						'exam_board'=>$exam_board,
						'advice'=>$advice,
						'notes'=>$notes,
					]);
				}
				Session::forget('cart');
				return redirect()->route('customer.booking.detail',$booking)->with('notify_success','Booking Successful');
			}
		}
		return back()->with('notify_error','Booking is empty');
	}
}
