<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        return view('back-end.admin.profile.profile');
    }

    public function updateProfile (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image',
            'address' => 'required'
        ]);

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

                if(file_exists($userImage.Auth::user()->image)){
                    unlink($userImage.Auth::user()->image);
                }
    
                Image::make($image)->resize(360,360)->save($userImage.$imageName);
                
            }
            else{
                $imageName = 'user.png';
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imageName;
            $user->address = $request->address;
            $user->save();

            Toastr::success('Profile updated successfully', 'Success');
            return redirect()>back();
          
    }


}
