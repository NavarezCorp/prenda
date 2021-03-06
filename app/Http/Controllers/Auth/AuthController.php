<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
//use Storage;
use File;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
            'pawnshop_id'=>(int) $data['pawnshop'],
            'province_id'=>(int) $data['province'],
            'city_id'=>(int) $data['city'],
            'branch'=>$data['branch'],
            'telephone_no'=>$data['telephone_no'],
            'mobile_no'=>$data['mobile_no'],
        ]);
        
        //Storage::makeDirectory(public_path('images/' . $user->id), 0777, TRUE, TRUE);
        File::makeDirectory('images/' . $user->id, 0777, TRUE, TRUE);
        
        return $user;
    }
    
    public function showRegistrationForm()
    {
        $data['pawnshops'] = DB::table('pawnshops')->lists('name', 'id');
        
        $provinces = DB::table('provinces')->orderBy('name', 'asc')->first();
        $data['cities'] = DB::table('cities')->where('description', 'like', '%' . strtolower($provinces->name) . '%')->lists('name', 'id');
        
        $data['provinces'] = DB::table('provinces')->orderBy('name', 'asc')->lists('name', 'id');
        
        return view('auth.register')->with(['data'=>$data]);
    }
}
