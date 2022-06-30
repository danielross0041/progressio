<?php

Route::post('/imageUpload-dummy', 'IndexController@imageUploadDumm')->name('front.imageupload');

Route::get('/', 'IndexController@index')->name('home');
Route::get('/about-us', 'IndexController@aboutUs')->name('aboutUs');
Route::get('/terms-and-conditions', 'IndexController@terms')->name('terms');
Route::get('/how-to-use', 'IndexController@howtouse')->name('howtouse');
Route::get('/contact-us', 'IndexController@contactus')->name('contactus');
Route::get('/faq', 'IndexController@faq')->name('faq');
Route::get('/prices', 'IndexController@prices')->name('prices');
Route::get('/faq-parent-guardian', 'IndexController@faqparentguardian')->name('faqparentguardian');
Route::get('/faq-tutor', 'IndexController@faqtutor')->name('faqtutor');
Route::get('/testimonials', 'IndexController@testimonials')->name('testimonials');
Route::get('/free-seminars', 'IndexController@freeseminars')->name('freeseminars');
Route::post('/contact-us-submit', 'IndexController@contactusSubmit')->name('contactusSubmit');

Route::get('/parent-register', 'ParentController@index')->name('parent.register');
Route::post('/parent-register/store', 'ParentController@store')->name('parent.register.store');

Route::get('/find-a-tutor', 'TutorController@find')->name('find-a-tutor');

Route::get('/search_tutor', 'TutorController@search_tutor')->name('search_tutor');

Route::get('/profile/{user}', 'TutorController@profile')->name('profile');

Route::get('/become-a-tutor', 'TutorController@step1')->name('tutor.step1');
Route::post('/tutor/step1save', 'TutorController@step1save')->name('tutor.step1save');
Route::get('/tutor/step2', 'TutorController@step2')->name('tutor.step2');
Route::get('/tutor/step3', 'TutorController@step3')->name('tutor.step3');
Route::post('/tutor/step3save', 'TutorController@step3save')->name('tutor.step3save');
Route::get('/tutor/step4', 'TutorController@step4')->name('tutor.step4');
Route::post('/tutor/step4save', 'TutorController@step4save')->name('tutor.step4save');
Route::get('/tutor/final', 'TutorController@finalstage')->name('tutor.final');
Route::get('/tutor/safeguarding-video/{user}', 'TutorController@safeguardingvideo')->name('tutor.safeguardingvideo');
Route::any('/tutor/quiz/{user}/{index?}', 'TutorController@quiz')->name('tutor.quiz');
Route::get('/quiz-complete', 'TutorController@quizcomplete')->name('tutor.quiz.complete');

Auth::routes();
Route::get('/backoffice', function(){
	return redirect('adminiy');
})->name('adminiy.backoffice');
Route::get('/adminoffice', function(){
	return redirect('adminiy');
})->name('adminiy.adminoffice');
Route::get('/admin', function(){
	return redirect('adminiy');
})->name('adminiy.admin');
Route::group(['middleware' => ['guest'],'prefix'=>'adminiy','namespace'=>'Adminiy'], function () {
	Route::get('/login', 'LoginController@index')->name('adminiy.login');
	Route::post('/performLogin', 'LoginController@performLogin')->name('adminiy.performLogin')->middleware('throttle:4,1');
});
Route::group(['middleware' => ['adminiy'],'prefix'=>'adminiy','namespace'=>'Adminiy'], function () {
	Route::get('/answers/{id}', 'IndexController@add_answers')->name('adminiy.add_answers');
	Route::post('/saveanswers/{id}', 'IndexController@saveanswers')->name('adminiy.saveanswers');
	Route::get('/tutor-meeting-admin', 'IndexController@tutor_meeting_admin')->name('adminiy.tutor_meeting_admin');
	Route::get('/tutor-meeting-admin-status/{id}/{status}', 'IndexController@tutor_meeting_admin_status')->name('adminiy.tutor_meeting_admin.status');
	Route::get('/tutor-meeting-admin-sendlink/{id}', 'IndexController@tutor_meeting_admin_sendlink')->name('adminiy.tutor_meeting_admin.sendlink');
	/*DO NOT EDIT*/
	Route::get('/',function(){
		return redirect('/adminiy/panel');
	});
	Route::get('/panel', 'IndexController@panel')->name('adminiy.panel');
	/*change password admin*/
	Route::post('/change-password',function(){
		if($_POST['change_password']==$_POST['change_confirm_password']){
			$adminiy=App\Model\Adminiy::find(adminiy()->id);
			$adminiy->password = Hash::make($_POST['change_password']);
			$adminiy->save();
			return back()->with('notify_success','Password Updated');
		}
		return back()->with('notify_error','Password does not match');
	})->name('adminiy.changepassword');
	/*change password admin end*/
	/*create listing start*/
	Route::get('/listing/{jsfile}', 'DNE\ListingController@ylisting')->name('adminiy.ylisting');

	Route::get('/profile-listing/{type}', 'IndexController@listing')->name('adminiy.listing');
	Route::post('/crudGenerator', 'IndexController@crudGenerator')->name('adminiy.crudGenerator');

	Route::get('/bookings-listing', 'DNE\ListingController@bookinglisting')->name('adminiy.bookinglisting');
	/*create listing end*/
	/*Fetching Multiple Images on screen*/
	Route::post('/multiimages-get', 'DNE\MultiImageCrudController@get')->name('adminiy.multiimages.fetch');
	Route::get('/multiimages-get-one/{table}/{id}', 'DNE\MultiImageCrudController@getone')->name('adminiy.multiimages.fetchone');
	/*Fetching Multiple Images on screen end*/
	/*fetching list data start*/
	Route::post('/ytable', 'DNE\ListingController@ytable')->name('ytable');
	/*fetching list data end*/
	Route::get('/send-mail', 'IndexController@sendmail')->name('adminiy.sendmail');
	/*Fast Crud*/
	Route::post('/fastCRUD', 'DNE\fastCRUDController@index')->name('adminiy.fastCRUD');
	/*Fast Crud End*/
	/*CONFIG CORE*/
	Route::get('/config', 'DNE\ConfigController@config')->name('adminiy.config');
	Route::post('/config', 'DNE\ConfigController@configSave')->name('adminiy.configSave');
	/*CONFIG CORE END*/
	/*DELETING CORE*/
	Route::post('/delete/ylisting/image', 'DNE\CoreDeletesController@imageDelete')->name('adminiy.imageDelete');
	Route::post('/delete/ylisting/{table}/{id?}', 'DNE\CoreDeletesController@ylistingDelete')->name('adminiy.delete.ylisting');
	/*DELETING CORE END*/
	/*FRONT END EDITOR*/
	Route::post('/statusAjaxUpdateCustom', 'DNE\FrontEndEditorController@statusAjaxUpdateCustom');
	Route::post('/statusAjaxUpdate', 'DNE\FrontEndEditorController@statusAjaxUpdate');
	Route::post('/updateFlagOnKey', 'DNE\FrontEndEditorController@updateFlagOnKey');
	/*FRONT END EDITOR End*/
	/*FRONT END IMAGE Upload*/
	Route::post('/imageUpload', 'DNE\FrontEndEditorController@imageUpload');
	/*FRONT END IMAGE Upload END*/
	/*ytable checkbox toggle*/
	Route::post('/update-checkbox', 'DNE\ytableCheckboxController@update')->name('adminiy.ytable.checkbox');
	/*ytable checkbox toggle end*/
	/*Get Any Flag against type*/
	Route::post('/getFlag', function(){
		$data = \collect(App\Model\m_flag::select('id','flag_value')->where('flag_type',$_POST['flag_type'])->where('is_active',1)->where('is_deleted',0)->get());
		$keyed = $data->mapWithKeys(function ($item) {
    		return [$item['id'] => $item['flag_value']];
		});
		return $keyed;
	});
	Route::post('/getDropdown', function(){
		$table = $_POST['table'];
		$key = $_POST['key'];
		$value = $_POST['value'];
		$where = $_POST['where'];
		$model_name = 'App\Model\\'.$table;
		$fetching = $model_name::select($key,$value)->where('is_active',1)->where('is_deleted',0);
		if(!empty($where)){
			$fetching = $fetching->whereRaw($where);
		}
		$data = \collect($fetching->get());
		$array = array();
		foreach($data as $dd){
			$array[$dd->$key] = $dd->$value;
		}
		return $array;
	});
	/*Get Any Flag against type end*/
	Route::get('/search', 'DNE\SearchController@index')->name('adminiy.mainsearch');
	Route::get('/logout', 'LoginController@logout')->name('adminiy.logout');
	/*Adminiy Panel Updater*/
	Route::post('update-panel','DNE\PanelUpdateController@updatePanel')->name('adminiy.updatePanel');
	Route::get('update-core-Json','DNE\PanelUpdateController@updateCoreJson')->name('adminiy.updateCoreJson');
	Route::get('check-git-version','DNE\PanelUpdateController@checkGitV')->name('adminiy.checkGitV');
	/*Adminiy Panel Updater End*/
	/*Artisan Console*/
	Route::get('artisan-console','DNE\CommandExecutionController@index')->name('adminiy.artisan.index');
	Route::post('artisan-execute','DNE\CommandExecutionController@execute')->name('adminiy.artisan.execute');
	/*Artisan Console End*/
	/*Database Administrator*/
	Route::get('database','DNE\DBController@index')->name('adminiy.db.index');
	Route::post('database-firequery','DNE\DBController@firequery')->name('adminiy.db.firequery');
	/*Database Administrator*/
});

Route::group(['middleware' => ['customer'],'prefix'=>'customer','namespace'=>'Customer'], function () {
	Route::group(['middleware' => ['school'],'prefix'=>'school','namespace'=>'School'], function () {
		Route::get('/panel', 'IndexController@index')->name('school.panel');
		Route::get('/anualreports', 'IndexController@anualreports')->name('school.anualreports');
		
		Route::get('/purchase-lession', 'LessonController@purchase')->name('school.lesson.purchase');
		
		Route::get('/book-lession', 'LessonController@book')->name('school.lesson.book');
		Route::post('/tutor/calculatePrice', 'LessonController@calculatePrice')->name('school.tutor.calculatePrice');
		Route::post('/tutor/getResults', 'LessonController@getResults')->name('school.tutor.getResults');
		Route::post('/tutor/getSchedule', 'LessonController@getSchedule')->name('school.tutor.getSchedule');
		Route::post('/tutor/updateBookingSession', 'LessonController@updateBookingSession')->name('school.tutor.updateBookingSession');
		Route::get('/tutor/session/provide-details', 'LessonController@provideDetails')->name('school.tutor.schedule.provideDetails');
		Route::post('/tutor/session/finalizeBooking', 'LessonController@finalizeBooking')->name('school.tutor.schedule.finalizeBooking');
		
		Route::get('/teachers', 'TeacherController@index')->name('school.teacher.list');
		Route::get('/teachers/add', 'TeacherController@add')->name('school.teacher.add');
		Route::post('/teachers/store', 'TeacherController@store')->name('school.teacher.store');

		Route::get('/pupil', 'PupilController@index')->name('school.pupil.list');
		Route::get('/pupil/add', 'PupilController@add')->name('school.pupil.add');
		Route::post('/pupil/store', 'PupilController@store')->name('school.pupil.store');
	});
	Route::group(['middleware' => ['teacher'],'prefix'=>'teacher','namespace'=>'Teacher'], function () {
		Route::get('/dashboard', 'IndexController@dashboard')->name('teacher.dashboard');
		Route::get('/bookings', 'IndexController@booking_tutor_listing')->name('teacher.booking_tutor_listing');
		Route::get('/panel', 'IndexController@index')->name('teacher.panel');
		Route::get('/cancel-booking/{booking?}', 'IndexController@cancelBooking')->name('teacher.booking.cancel');
		Route::get('/complete-booking/{booking}', 'IndexController@markcomplete')->name('teacher.markcomplete');
		Route::get('/book-tutor', 'BookingController@booktutor')->name('teacher.tutor.book');
		Route::get('/lesson-reports', 'LessonController@reports')->name('teacher.lesson.reports');
		Route::post('/tutor/getResults', 'BookingController@getResults')->name('teacher.tutor.getResults');
		Route::post('/tutor/getSchedule', 'BookingController@getSchedule')->name('teacher.tutor.getSchedule');
		Route::post('/tutor/calculatePrice', 'BookingController@calculatePrice')->name('teacher.tutor.calculatePrice');
		Route::post('/tutor/updateBookingSession', 'BookingController@updateBookingSession')->name('teacher.tutor.updateBookingSession');
		Route::get('/tutor/session/provide-details', 'BookingController@provideDetails')->name('teacher.tutor.schedule.provideDetails');
		Route::post('/tutor/session/finalizeBooking', 'BookingController@finalizeBooking')->name('teacher.tutor.schedule.finalizeBooking');
		Route::get('/buy-coin', 'PaymentController@buycoin')->name('teacher.buycoin');
		Route::get('/report/{booking}', 'BookingController@report')->name('teacher.report');
		Route::get('/pupil', 'PupilController@index')->name('teacher.pupil.list');
		Route::get('/pupil/add', 'PupilController@add')->name('teacher.pupil.add');
		Route::post('/pupil/store', 'PupilController@store')->name('teacher.pupil.store');
		Route::post('/updateprofile', 'IndexController@updateprofile')->name('teacher.updateprofile');
	});
	Route::group(['middleware' => ['parent'],'prefix'=>'parent','namespace'=>'Parent'], function () {
		Route::get('/panel', 'IndexController@index')->name('parent.panel');
		Route::get('/pupil', 'PupilController@index')->name('parent.pupil.list');
		Route::get('/pupil/add', 'PupilController@add')->name('parent.pupil.add');
		Route::post('/pupil/store', 'PupilController@store')->name('parent.pupil.store');
		Route::get('/bookings', 'IndexController@booking_tutor_listing')->name('parent.booking_tutor_listing');
		Route::get('/book-tutor', 'BookingController@booktutor')->name('parent.tutor.book');
		Route::post('/tutor/getResults', 'BookingController@getResults')->name('parent.tutor.getResults');
		Route::post('/tutor/getSchedule', 'BookingController@getSchedule')->name('parent.tutor.getSchedule');
		Route::post('/tutor/getStartTime', 'BookingController@getStartTime')->name('parent.tutor.getStartTime');
		Route::post('/tutor/calculatePrice', 'BookingController@calculatePrice')->name('parent.tutor.calculatePrice');
		Route::post('/tutor/updateBookingSession', 'BookingController@updateBookingSession')->name('parent.tutor.updateBookingSession');
		Route::get('/tutor/session/provide-details', 'BookingController@provideDetails')->name('parent.tutor.schedule.provideDetails');
		Route::post('/tutor/session/finalizeBooking', 'BookingController@finalizeBooking')->name('parent.tutor.schedule.finalizeBooking');
		Route::get('/report/{booking}', 'BookingController@report')->name('parent.report');
		Route::get('/complete-booking/{booking}', 'IndexController@markcomplete')->name('parent.markcomplete');
		Route::get('/cancel-booking/{booking?}', 'IndexController@cancelBooking')->name('parent.booking.cancel');
		Route::get('/lesson-reports', 'LessonController@reports')->name('parent.lesson.reports');
	});
	Route::group(['middleware' => ['pupil'],'prefix'=>'pupil','namespace'=>'Pupil'], function () {
		Route::get('/panel', 'IndexController@index')->name('pupil.panel');
		Route::get('/chat/{booking}', 'IndexController@chat')->name('pupil.chat');
		Route::get('/report/{booking}', 'IndexController@report')->name('pupil.report');
	});
	Route::group(['middleware' => ['tutor'],'prefix'=>'tutor','namespace'=>'Tutor'], function () {
		Route::get('/dashboard', 'IndexController@dashboard')->name('tutor.dashboard');
		Route::get('/requests', 'IndexController@booking_requests')->name('tutor.booking_requests');
		Route::get('/bookings', 'IndexController@booking_tutor_listing')->name('tutor.booking_tutor_listing');
		Route::get('/requests/{booking}', 'IndexController@accept_requests')->name('tutor.accept_requests');
		Route::get('/cancel-booking/{booking?}', 'IndexController@cancelBooking')->name('tutor.booking.cancel');
		Route::get('/schedule', 'ScheduleController@index')->name('tutor.schedule');
		Route::post('/schedule/fetchweeks', 'ScheduleController@fetchweeks')->name('tutor.schedule.fetchweeks');
		Route::post('/schedule/update', 'ScheduleController@update')->name('tutor.schedule.update');
		Route::post('/schedule/copy', 'ScheduleController@copyWeek')->name('tutor.schedule.copy');
		//panel
		Route::get('/panel', 'IndexController@index')->name('tutor.panel');
		Route::post('/updateprofile', 'IndexController@updateprofile')->name('tutor.updateprofile');
		
		Route::get('/chat/{booking}', 'IndexController@chat')->name('tutor.chat');
		Route::get('/endsession/{booking}', 'IndexController@endsession')->name('tutor.endsession');
		Route::post('/updatereport/{booking}', 'IndexController@updatereport')->name('tutor.updatereport');
	});
	
	Route::get('/',function(){
		return redirect('/customer/panel');
	});
	Route::get('/booking-detail/{booking}', 'IndexController@bookingDetail')->name('customer.booking.detail');
	Route::get('/attend/{booking}', 'IndexController@attend')->name('customer.attend');
	Route::post('/sendchat/{booking}', 'IndexController@sendchat')->name('customer.sendchat');
	Route::get('agora-token/{booking}/{user}','AgoraController@generateAgoraToken')->name('api.generateAgoraToken');
	Route::get('agora-token-viewer/{booking}/{user}','AgoraController@generateAgoraTokenViewer')->name('api.generateAgoraTokenViewer');
	/*change password customer*/
	Route::post('/change-password',function(){
		if(!empty($_POST['change_password'])&&!empty($_POST['change_confirm_password'])){
			if($_POST['change_password']==$_POST['change_confirm_password']){
				$adminiy=App\Model\User::find(Auth::user()->id);
				$adminiy->password = Hash::make($_POST['change_password']);
				$adminiy->save();
				return back()->with('notify_success','Password Updated');
			}
			return back()->with('notify_error','Password does not match');
		}
		return back()->with('notify_error','Password and confirm password can not be empty');
	})->name('customer.changepassword');
	/*change password customer end*/
	Route::get('/contact-us', 'IndexController@contactus')->name('customer.contactus');
	Route::post('/contact-us/submit', 'IndexController@contactussubmit')->name('customer.contactus.submit');
	Route::get('/panel', 'IndexController@index')->name('customer.panel');
	
	Route::get('/transactions', 'IndexController@transactions')->name('customer.transactions');
	
	Route::get('/logout', 'IndexController@logout')->name('customer.logout');
});