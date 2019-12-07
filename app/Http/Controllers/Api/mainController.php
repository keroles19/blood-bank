<?php

namespace App\Http\Controllers\Api;

use App\bloodType;
use App\Category;
use App\City;
use App\Contact;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\Post;
use App\setting;
use App\Token;
use Illuminate\Http\Request;



class mainController extends Controller
{
     //=================== general service ====================================
    // governorates function
    public function governorates(){
        $governorates = Governorate::all();
        return responseJson("1", "كل  المحافظات " , $governorates );
    }

    // cities function
    public function cities(Request $request){
        $cities = City::where(function ($query) use ($request){
            if($request->has("governorate_id"))
            {
                $query->where("governorate_id",$request->governorate_id);
            }

        })->get();
        return responseJson("1"  , "تم  " , $cities);
    }
     // setting function
     public function setting(){
        $settings = setting::all();
        return responseJson("1"  , "الاعدادات" , $settings);
    }



    // contacts function
    public function contacts(Request $request){
        $validate = validator()->make($request->id(),[

            "name"=>"required",
            "email"=>"required",
            "phone" =>"required",
            "subject"=>"required|max:50",
            "message"=>"required|max:200"
        ]);

        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }
        $msg = Contact::create($request->all());
        return responseJson("1" ,  "تم" ,$msg);
    }

      //==================== ==================   ====================================================

     //====================================   Posts services ====================================

     //   create post
      public function createPost(Request $request){

        $validate = validator()->make($request->all(),[

            "title"=>"required",
            "body" =>"required",
            "category_id"=>"required|exists:categories,id",
        ]);

        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }
        $post = Post::create($request->all());
        return responseJson("1" ,  "تم" ,$post);
    }


      // posts function
      public function posts(Request $request){

        $posts =post::where(function ($query) use ($request){
            if($request->has("category_id"))
            {
                $query->where("category_id",$request->id);
            }
        })->get();
        return responseJson("1" , "المنشورات", $posts );
    }


      // categories function
      public function categories(){
        $catigeries = Category::all();
        return responseJson("1"  , "الفئات", $catigeries);
    }

     // bloodType function
      public function bloodType(){
            $bloodType = bloodType::all();
            return responseJson("1" , "فصيله الدم", $bloodType );
        }

      //  toggle favourite post
      public function favourite(Request $request){

        $validate = validator()->make($request->all(),[
            "post_id"=>"required|exists:posts,id",
        ]);
        if($validate->fails()) {
            return responseJson(0, $validate->errors()->first(), $validate->errors());
        }
        $request->user()->posts()->toggle([$request->post_id]);
        return responseJson(0,"تم ");
    }



       // list favourite posts
       public function  listFavourite(Request $request){
        $validate = validator()->make($request->all(),[
            "post_id"=>"required|exists:posts,id",
        ]);
        if($validate->fails()) {
            return responseJson(0, $validate->errors()->first(), $validate->errors());
        }
        $postId = auth()->user()->posts()->pluck('posts.id')->toArray();
        if(count($postId))
            return responseJson(true,"success",$postId);
        else
            return responseJson(false,'error');

    }

        //=========================================== ===========================================

       // ========================================== Donation service ============================
        // notification-settings function
       public function notificationSettings(Request $request){
        $validate = validator()->make($request->all(),[

            "governorates"=>"required|array",
            "blood_types"=>"required|array",
        ]);

        if($validate->fails()){
            return responseJson(0,$validate->errors()->first(),$validate->errors());
        }

        if($request->has('governorates') && $request->has("blood_types")){
            $request->user()->governorates()->sync($request->governorates);
            $request->user()->bloodTypes()->sync($request->blood_types);

        }
        $data = [
            'governorates'=> $request->user()->governorates()->pluck('governorates.id')->toArray(),
            "blood_type" => $request->user()->bloodTypes()->pluck('blood_types.id')->toArray()
        ];

        return responseJson(1,'success',$data);
    }

        // donation-request create
        public function donationRequestCreate(Request $request){
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








}
