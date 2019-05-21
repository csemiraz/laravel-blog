<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Image;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role->id == 1) {
            $this->redirectTo = route('admin.dashboard');
        }
        elseif(Auth::check() && Auth::user()->role->id == 2) {
            $this->redirectTo = route('author.dashboard');
        }
        else{
            $this->redirectTo = route('user.dashboard');
        }
        $this->middleware('guest');
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
            'image' => ['image'],
            'address' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     
    /* Image upload for user */
    public function imageFile() {
        $request = request();
        $image = $request->file('image');
        $slug = str_slug($request->name, '_');

        if(isset($image))
        {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $userImage = 'assets/images/user/';
            if(!file_exists($userImage)) {
                mkdir($userImage, 666, true);
            }

            Image::make($image)->resize(360,360)->save($userImage.$imageName);
            
        }
        else{
            $imageName = 'user.png';
        }
        return $imageName;

    }  

    protected function create(array $data)
    {
        $imageName = $this->imageFile();
    
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imageName,
            'address' => $data['address']
        ]);
    }



}
