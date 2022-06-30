<?php
namespace App\Http\Controllers;
use Helper;
use View;
use Illuminate\Support\Str;
use App\Http\Requests\yTableinquiryRequest;
use App\Http\Requests\yTablecareerRequest;
use App\Model\inquiry;
use App\Model\m_flag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
	public function imageUploadDumm(Request $request){
		$path = $request->file('file')->store('Uploads/imagetable/'.md5(Str::random(20)), 'public');
		return response()->json(['url'=>asset($path)]);
	}
    
    public function index()
    {
        // $m_flag = m_flag::find(1965);
        // dd($m_flag->m_flag_main,$m_flag->m_flag_thumb);
        // $banners = Helper::fireQuery("select banner_management.*
        //     ,img_1.img_path as img_1_img
        //     ,img_2.img_path as img_2_img from banner_management 
        //     left join imagetable as img_1 on img_1.ref_id = banner_management.id and img_1.type=1 and img_1.table_name='banner_management'
        //     left join imagetable as img_2 on img_2.ref_id = banner_management.id and img_2.type=1 and img_2.table_name='banner_management_thumb'
        //     where banner_management.is_active=1 and banner_management.is_deleted=0");
        // $deals = Helper::getImageWithData('products','id','',"is_active=1 and is_deleted=0 and product_type='deals'",0,'order by id asc');
        $subjects = m_flag::where('flag_type','SUBJECTS')->where('is_active',1)->orderBy('id','asc')->get();
        return view('welcome')->with('title',Helper::returnFlag(123))
        ->with('homeMenu',true)
        ->with(compact('subjects'));
    }
    public function aboutUs(){
        return view('aboutus')->with('title','About Us')
        ->with('aboutMenu',true);
    }
    public function terms()
    {
        return view('terms')->with('title','Terms and Conditions');
    }
    public function freeseminars(){
        $data=Helper::returnMod('freeseminars')->orderBy('id','asc')->get();
        return view('freeseminars')->with('title','Free Seminars')
        ->with('freeseminarsMenu',true)
        ->with(compact('data'));
    }
    public function howtouse(){
        return view('howtouse')->with('title','How to Use')
        ->with('howtouseMenu',true);
    }
    public function prices(){
        return view('prices')->with('title','Prices')
        ->with('pricesMenu',true);
    }
    public function faq(){
        return view('faq')->with('title','Faq')
        ->with('faqMenu',true);
    }
    public function faqparentguardian(){
        return view('faqparentguardian')->with('title','FAQ Parent Guardian')
        ->with('faqMenu',true);
    }
    public function faqtutor(){
        return view('faqtutor')->with('title','FAQ Tutor')
        ->with('faqMenu',true);
    }
    public function testimonials(){
        return view('testimonials')->with('title','Testimonials')
        ->with('testimonialsMenu',true);
    }
    public function contactus()
    {
        return view('contactus')->with('title','Contact us')->with('contactmenu',true);
    }
    public function contactusSubmit(yTableinquiryRequest $request){
        $validator = $request->validated();
        $inquiry = new inquiry;
        $inquiry->inquiries_name = $request->inquiries_name;
        $inquiry->inquiries_lname = $request->inquiries_lname;
        $inquiry->inquiries_email = $request->inquiries_email;
        $inquiry->inquiries_phone = $request->inquiries_phone;
        $inquiry->extra_content = $request->extra_content;
        $inquiry->save();
        $this->echoSuccess("Inquiry Saved");
    }
}
