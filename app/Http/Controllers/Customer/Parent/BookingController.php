<?php
namespace App\Http\Controllers\Customer\Parent;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\User;
use App\Model\m_flag;
use App\Model\tutor_schedule;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests\bookingRequest;
use App\Model\{bookings, booking_pupils};
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function booktutor(){
		$pupils = User::where('user_type',2)->where('school_id',Auth::user()->id)->orderBy('id','asc')->get();
		$universities=m_flag::where('is_active',1)->where('flag_type','TUTORUNIVERSITIES')->get();
		$subjects=m_flag::where('is_active',1)->where('flag_type','SUBJECTS')->get();
        return view('customer.parent.tutor.book')->with('title','Book tutor')
		->with(compact('universities','subjects','pupils'));
    }
	public function getResults(Request $request){
		$subject = $request->subject;
		$date = $request->date;
		// dd($subject,$date);
		$users = User::where('user_type',3)->where('is_active',1)
		->select('users.id','users.email','users.profile_image','users.name','tutor_details.subject',DB::raw('0 as showSchedule'))
		->rightJoin('tutor_details',function($join) use ($subject){
			$join->on('users.id', '=', 'tutor_details.tutor_id')
			->where('tutor_details.subject', $subject);
		})
		->orderBy('users.last_login','desc')->with('tutordetail','tutorsubjects')->get();
		// dd($users);
		// ->rightJoin('tutor_schedule',function($join) use ($date, $time) {
		// 	$join->on('users.id', '=', 'tutor_schedule.tutor_id')
		// 	->where('date',$date);
		// })
		// dd($users);
		$body = '';
		if (!$users->isEmpty()) {
			foreach ($users as $key => $value) {
				$body .= '<div class="row mt-3 tutor_result tutor_insert">
				    <div class="col-md-3">
				        <h4>'.$value->name.'</h4>
				        <img src="'.asset($value->profile_image).'"  class="img-responsive jacob-img" />
				    </div>
				    <div class="col-md-9">
				        <p><b>Per Hour</b> $'.$value->tutordetail->per_hour_price.'</p>
				        <p><b>Beief Description</b> '.$value->tutordetail->brief_description.' </p>
				        <p><b>University</b> '.$value->tutordetail->uni->flag_value.'</p>
				        <p>
				        	<b>Subjects</b>
					        <ul class="list-group-item-light">
					            <li> '.$value->tutordetail->tutor_subject->flag_value.'</li>
					        </ul>
					    </p>
				        <button class="btn schedule_btn" data-tutor_id = "'.$value->id.'">See Schedule</button>
				    </div>
				    <div class="insertHere"></div>
				</div>';
			}
		} else{
			$body .= '<div class="tutor_result">
				<h4 class="no-tutor">No Tutor Result</h4>
			</div>';
		}
		return response()->json($body);
	}
	public function getSchedule(Request $request){
		
		$tutor_id = $request->tutor_id;
		$start_date = $request->start_date;
		$arr = [];
		$body ='<div class="col-md-12 mt-2 booking">
	        <ul class="bookinginrow">';
		for($i = 8; $i < 19; $i++){
			for($m=0;$m<60;$m+=5){
				$time = ($i<10?'0'.$i:$i).':'.($m<10?'0'.$m:($m<10?('0'.$m):$m));
				$check = tutor_schedule::where('tutor_id',$tutor_id)->where('date',$start_date)->where('time',$time)->count();
				$class = $check>0?"available":"unbooked";
				$function = 'myFunction("'.$tutor_id.'","'.$time.'","'.$start_date.'","'.$class.'")';
				$body .= '<li class="'.$class.'" onclick='.$function.'>'.$time.'</li>';
			}
		}
		$body .= '</ul>
	    </div>';
		// dd($body);
		return response()->json($body);
	}
	public function getStartTime(Request $request)
	{
		$tutor_id = $request->tutor_id;
		$time_selected = $request->time_selected;
		$availablility = $request->availablility;
		$start_date = $request->start_date;
		$count = 0;
		// dd($_POST);
		$body = '';
		for($i = 8; $i < 19; $i++){
			for($m=0;$m<60;$m+=5){
				$time = ($i<10?'0'.$i:$i).':'.($m<10?'0'.$m:($m<10?('0'.$m):$m));
				if ($time >= $time_selected) {
					$check = tutor_schedule::where('tutor_id',$tutor_id)->where('date',$start_date)->where('time',$time)->count();
					if ($check>0) {
						if ($count == 0) {
							$selected = "selected";
						} else{
							$selected = "";
						}
						$count = $count + 1;
						$body .= '<option value="'.$time.'" class="remove_option" '.$selected.' >'.$time.'</option>';
					}
				} 
			}
		}
		$response['body'] = $body;
		// dd($body);
		return response()->json($response);
	}
	public function calculatePrice(Request $request){
		$tutor_id = $request->tutor_id;
		$start_time = $request->start_time;
		$number_of_sessions = $request->number_of_sessions;
		$pupil = $request->pupil;
		$user = User::find($tutor_id);
		if($user->id!=''){
			$perHour = $user->tutordetail->per_hour_price;
			$perHour = $perHour*(count($pupil));
			if($perHour>0){
				$begin = new \DateTime($start_time);
				$price = ($number_of_sessions*$perHour);
				return response()->json(['status'=>'1', 'data'=>[
					'price' => $price,
					'hours' => ($number_of_sessions),
				]]);
			}
		}
		return response()->json(['status'=>'0']);
	}
	public function updateBookingSession(Request $request){
		$time = $request->time_selected;
		$time = explode(":", $time);
		$first = $time[0]+1;
		if ($first<10) {
			$book_time_to = "0".($time[0]+1).":".$time[1];
		} else{
			$book_time_to = ($time[0]+1).":".$time[1];
		}
		$cart = [];
		if(Session::has('cart')){
			$cart = Session::get('cart');
		}
		// dd($_POST,$book_time_to);
		$cart[] = [
			'tutor_id'=>$request->tutor_id,
			'book_from_time'=>$request->time_selected,
			'book_to_time'=>$book_time_to,
			'pupils'=>$request->pupil,
			'booking_date'=>$request->start_date,
			'subject_id'=>$request->subject,
			'price'=>$request->amount,
			'session'=>$request->session,
		];
		// dd($cart)
		Session::put('cart',$cart);
		return response()->json(['status'=>'1']);
	}
	public function provideDetails(){
		if(Session::has('cart')){
			$cart = Session::get('cart');
			if(count($cart)>0){
				$data = $cart[(count($cart)-1)];
				return view('customer.parent.tutor.bookingDetails')->with('title','Provide Booking Request Details')
				->with('data',$data);
			}
		}
	}
	public function finalizeBooking(bookingRequest $request){

		// dd($_POST);
		if(Session::has('cart')){
			$cart = Session::get('cart');
			if(count($cart)>0){
				$data = $cart[(count($cart)-1)];
				// dd($data);
				$tutor_id = $data['tutor_id']; 
				$book_from_time = $data['book_from_time'];
				$book_to_time = $data['book_to_time'];
				$booking_date = $data['booking_date'];
				$subject_id = $data['subject_id'];
				$pupils = $data['pupils'];
				$price = $data['price'];
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
	public function report(bookings $booking){
		$title = 'Report #'.$booking->id;
		return view('customer.parent.report')->with(compact('booking','title'));
	}
}
