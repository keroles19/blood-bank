<?php

namespace App\Http\Controllers\Front;


use App\BloodType;
use App\City;
use App\Client;
use App\Contact;
use App\DonationRequest;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class frontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client')->only('toggleFavourite');
    }

    public  function  home(){
        $articles = Post::where('created_at','<',Carbon::now()->toDateTime())->take(8)->get();
        return view('front.home',compact('articles'));
    }

    public  function  about(){

        return view('front.about');
    }
    public function article($id)
    {

        $article = Post::findOrFail($id);
        return view('front.articles.show',compact('article'));

    }

    public  function donations(){
        $donations = DonationRequest::paginate(5);
        return view('front.donations',compact('donations'));
    }


    public function showDonation($id){
        $donation = DonationRequest::findOrFail($id);
        if($donation){
            return view('front.showDonation',compact('donation'));
        }
        else{
            abort(404);
        }
    }

    public function donationSearch(Request $request){

        global $output;
        $output = '';
        $donation = DonationRequest::where('blood_type_id',$request->bloodType)
            ->where('city_id',$request->city)->latest()->paginate(5);
        if(count($donation)){
            foreach ($donation as $d){
                $output.='
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="type">
                                  <h2>'.BloodType::find($d->blood_type_id)->getAttribute('name').'</h2>
                                    </div>
                                </div>
                                <div class="data col-lg-6">
                                    <h4>Name: '.Client::find($d->client_id)->getAttribute('name').'</h4>
                                    <h4>Hospital: '.$d->hospital_name.'</h4>
                                    <h4>City: '.City::find($d->city_id)->getAttribute('name').'</h4>
                                </div>
                                <div class="col-lg-3">
                                    <button><a href="'.url('donation/'.$d->id).'">Details</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                     ';
            }
        }
        else
        {
            $output .= '<div class="row">
                <div class="col-11 m-3 px-3">
                    <div class="alert alert-info">
                        No Donate Related with your search 
                        <a href="'.url('donations').'"> show all donations available </a> 
                        </div></div></div>';
        }
        return $output;

    }


    // articles
    public function articles(){
        $articles = Post::paginate(20);
        return view('front\articles.articles',compact('articles'));
    }

    //articles Favourite
    public  function  articlesFavourite(){

        $articles =auth('client')->user()->posts;
        return view('front\articles.articleFav',compact('articles'));

    }

    // contact-us
    public function contact(){
        return view('front.contact');
    }

    // contact us
    public  function senMessage(Request $request){

        $this->validate($request,[
        "name" => "required",
        "email" => "required|email|exists:clients,email",
        "phone" => "required|exists:clients,phone",
        "subject" => "required",
        "message" => "required"
        ]);
        $message = Contact::create($request->all());
        if($message){
            return back()->with('status' , 'message send successful');
        }

    }

    //  donation   request
    // donation
    public function donation(){
        return view('front.donation');
    }


    // donation-request create
    public function createDonation(Request $request){
        $validate = validator()->make($request->all(),[
            "name"=>"required",
            "age"=>"required",
            "blood_type_id" =>"required|exists:blood_types,id",
            "bags_num"=>"required:digits",
            "hospital_name"=>"required",
            "hospital_address"=>"required",
            "city_id"=>"required|exists:cities,id",
        ]);
        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }
        $send = "";
        // create donation request
        $donationRequest = $request->user()->donationRequests()->create($request->all());
        // find  clients suitable for this donation
        $clientsIdes = $donationRequest->city->governorate->clients()
            ->whereHas("bloodTypes",function($q) use ($request){
                $q->where("blood_types.id",$request->blood_type_id);
            })->pluck("clients.id")->toarray();

        //dd($clientsIdes);

        if(count($clientsIdes)){

            $notifications = $donationRequest->notification()->create([

                "title" => "يوجد حاله تبرع ",
                "content" => $donationRequest->blood_type."محتاج متبرع لفصيله "
            ]);
            // add record in    client_notification table
            $notifications->clients()->attach($clientsIdes);

            // push  notification by firebase

            $token = Token::whereIn('client_id',$clientsIdes)
                ->where('token','!=',null)->pluck('token')->toarray();
            if(count($token)){

                $title = $notifications->title;
                $body = $notifications->content;
                $data = [
                    'donation_request_id'=>$donationRequest->id
                ];
                $send = notifyByFirebase($title,$body,$token,$data);

            }

        }

        return responseJson(1,'تم الاضافه بنجاح ',$donationRequest);
    }



 /// ============================
    public function toggleFavourite(Request $request)
    {
        $toggle =  auth('client')->user()->posts()->toggle([$request->post_id]);
        return responseJson(1,'success',$toggle);
    }




}
