<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:client');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function clientValidator($data)
    {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone'=>['required'],
            'blood_type_id' =>['required','exists:blood_types,id'],
            'date_of_birth'=>['required'],
            'city_id'=>['required','exists:cities,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public  function showClientRegisterFrom(){
        return view('front.signUp');
    }

    public  function createClient(Request $request){
        $this->clientValidator($request);
        $request->merge(["password" => Hash::make($request->password)]); // hash password
        $client = Client::create($request->all());
        $id = $client->id;
            $client->api_token = str_random(60);                 // added random token
            $client->save();
           Auth::guard('client')->loginUsingId($id);
            return $this->registered($request, $client)
                ?: redirect($this->redirectPath());

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
