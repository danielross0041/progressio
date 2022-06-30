<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Helper;
use View;
use DB;
use Illuminate\Support\Str;
use App\Http\Requests\tutorStep1Request;
use App\Http\Requests\tutorStep3Request;
use App\Model\m_flag;
use App\Model\tutor_details;
use App\Model\User;
use App\Model\school;
use App\Model\tutor_meeting_admin;
use App\Model\tutor_quiz_questions;
use Hash;
use Session;
class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
	public function find(){
		
		$subjects=m_flag::where('is_active',1)->where('flag_type','SUBJECTS')->get();
		$users = User::where('user_type',3)->where('is_active',1)
		->select('users.id','users.email','users.profile_image','users.name','tutor_details.per_hour_price','tutor_details.subject')
		->leftJoin('tutor_details','users.id','=','tutor_details.tutor_id');
		if (isset($_GET['tutor_price'])) {
			// dd($_GET);
			$users = $users->where('tutor_details.subject',$_GET['tutor_subject']);
			if ($_GET['tutor_price'] == 0) {
				$users = $users->where('tutor_details.per_hour_price','<=',25);
			} elseif ($_GET['tutor_price'] == 1) {
				$users = $users->where('tutor_details.per_hour_price','>',25)->where('tutor_details.per_hour_price','<=',35);
			} elseif ($_GET['tutor_price'] == 2) {
				$users = $users->where('tutor_details.per_hour_price','>',35);
			}
		}
		
		$users = $users->orderBy('users.last_login','desc')->with('tutordetail','tutorsubjects')->paginate(5);
		return view('find-a-tutor')->with('title','Find a Tutor')
        ->with('findTutor',true)
		->with(compact('subjects','users'));
	}
	public function search_tutor()
	{
	}



	public function profile(User $user){
		return view('profile')->with('title',$user->name)
        ->with('findTutor',true)
		->with(compact('user'));
	}
    public function step1()
    {
    	$school = school::where('is_active',1)->where('is_verified',0)->orWhere('is_verified',null)->get();
    	// dd($school);
		$universities=m_flag::where('is_active',1)->where('flag_type','TUTORUNIVERSITIES')->get();
		$subjects=m_flag::where('is_active',1)->where('flag_type','SUBJECTS')->get();
        return view('tutor.step1')->with('title','Become a Tutor')
        ->with('tutorfirstMenu',true)
        ->with(compact('universities','subjects','school'));
    }
	public function step1save (tutorStep1Request $request) {
		$school_id = 0;
		if (isset($_POST['school_name']) && $_POST['school_name'] !='') {
			$school =User::create([
				'email'=>$request->school_email,
				'password'=>Hash::make('12345678'),
				'is_deleted'=>0,
				'is_active'=>1,
				'name'=>$request->school_name,
				'user_type'=>0
			]);
			$schoolDetail =school::create([
				'school_id'=>$school->id,
				'area'=>$request->school_area,
				'postal_code'=>$request->school_postal_code,
				'is_verified'=>0
			]);
			$school_id = $school->id;
		}
		$user =User::create([
			'email'=>$request->email,
			'password'=>Hash::make('12345678'),
			'is_deleted'=>0,
			'is_active'=>0,
			'name'=>$request->name,
			'user_type'=>3,
			'school_id'=>$school_id
		]);
		Session::put('registered_tutor_current',$user->id);
		tutor_details::create([
			'tutor_id'=>$user->id,
			'birth_date'=>$request->birth,
			'university'=>$request->university,
			'year'=>$request->year,
			'phone'=>$request->phone,
			'subject'=>$request->subject,
			'brief_description'=>$request->brief_description,
			'hear_about_us'=>$request->hear_about_us,
			'enhanced'=>($request->enhanced=='No'?0:1),
		]);
		$this->echoSuccess($user->id);
		//return redirect()->route('tutor.step2')->with('notify_success','Step 1 Completed');
	}
	public function step2(){
		if(Session::has('registered_tutor_current')){
			$user = User::with(['tutordetail'])->find(Session::get('registered_tutor_current'));
			return view('tutor.step2')->with('title','Become a Tutor Step 2')
			->with('tutorfirstMenu',true)
			->with(compact('user'));
		}
		abort(404);
	}
	public function step3(){
		if(Session::has('registered_tutor_current')){
			$user = User::with(['tutordetail'])->find(Session::get('registered_tutor_current'));
			return view('tutor.step3')->with('title','Become a Tutor Step 3')
			->with('tutorfirstMenu',true)
			->with(compact('user'));
		}
		abort(404);
	}
	public function step3save(tutorStep3Request $request){
		if(Session::has('registered_tutor_current')){
			$user = User::find(Session::get('registered_tutor_current'));
			$profile_picture = '';
			$additional_files = [];
			foreach($request->identity_proof as $identity_proof){
				$custom_file_name = time().'-'.$identity_proof->getClientOriginalName();
				$additional_files[] = $identity_proof->storeAs('Uploads/tutors/'.$user->id,$custom_file_name,'public');
			}
			$custom_file_name = time().'-'.$request->file('profile_picture')->getClientOriginalName();
			$user->profile_image = $request->file('profile_picture')->storeAs('Uploads/users/'.md5(Str::random(20)),$custom_file_name,'public');
			$user->save();
			$tutor_details = tutor_details::where('tutor_id',Session::get('registered_tutor_current'))
			->update([
				'bank_name'=>$request->bank_name,
				'account_name'=>$request->account_name,
				'sort_code'=>$request->sort_code,
				'account_number'=>$request->account_number,
				'additional_images'=>json_encode($additional_files)
			]);
			return redirect()->route('tutor.step4')->with('notify_success','Details saved');
		}
	}
	public function step4(){
		if(Session::has('registered_tutor_current')){
			$user = User::with(['tutordetail'])->find(Session::get('registered_tutor_current'));
			return view('tutor.step4')->with('title','Become a Tutor Step 4')
			->with('tutorfirstMenu',true)
			->with(compact('user'));
		}
		abort(404);
	}
	public function step4save(){
		tutor_meeting_admin::create([
			'tutor_id'=>Session::get('registered_tutor_current'),
			'date'=>$_POST['date'],
			'time'=>$_POST['time'],
		]);
		return redirect()->route('tutor.final');
	}
	public function finalstage(){
		if(Session::has('registered_tutor_current')){
			$user = User::with(['tutordetail'])->find(Session::get('registered_tutor_current'));
			return view('tutor.finalstage')->with('title','Success')
			->with('tutorfirstMenu',true)
			->with(compact('user'));
		}
		abort(404);
	}
	public function safeguardingvideo(User $user){
		if($user->is_active==0){
			return view('tutor.safeguardingvideo')->with('title','Safe Guarding Video')
			->with('tutorfirstMenu',true)
			->with(compact('user'));
		}
		abort(404);
	}
	public function quiz(User $user, $index=''){
		if(!$index){
			return redirect()->route('tutor.quiz',[$user->id,1]);
		}
		if($user->is_active==0){
			if(isset($_POST)&&!empty($_POST)){
				$questions = [];
				if(Session::has('selected_quetions')){
					$questions = Session::get('selected_quetions');
				}
				$tutor_quiz_questions_check = tutor_quiz_questions::orderBy('id','asc')->offset(($index-2))->first();
				$questions[$tutor_quiz_questions_check->id] = $_POST['options_selected'];
				Session::put('selected_quetions',$questions);
				//dump($questions);
			}
			$tutor_quiz_questions = tutor_quiz_questions::orderBy('id','asc')->offset(($index-1))->first();
			if($tutor_quiz_questions){
				return view('tutor.quiz')->with('title','Quiz')
				->with('tutorfirstMenu',true)
				->with(compact('user','index','tutor_quiz_questions'));
			}else{
				return redirect()->route('tutor.quiz.complete');
			}
		}
		abort(404);
	}
	public function quizcomplete(){
		$percent = 0;
		if(Session::has('selected_quetions')){
			$questions = Session::get('selected_quetions');
			$total_marks = (count($questions)*100);
			$total_achieved = 0;
			foreach($questions as $questionk=>$questionv){
				$question = tutor_quiz_questions::find($questionk);
				$answers = $question->answers;
				$total_correct_answers = $question->answers()->where('is_correct',1)->count();
				$correct_found = 0;
				foreach($answers as $answer){
					$user_answered=false;
					if (in_array($answer->id, $questionv)){
						/*user answered this*/
						$user_answered=true;
					}
					if($answer->is_correct==1){
						if($user_answered===true){
							$correct_found++;
						}
					}
				}
				if($correct_found==$total_correct_answers){
					$total_achieved+=100;
				}
			}
			$percent = number_format((($total_achieved/$total_marks)*100),2);
		}
		return view('tutor.quizcomplete')->with('title','Quiz Completed')
		->with('percent',$percent);
	}
}
