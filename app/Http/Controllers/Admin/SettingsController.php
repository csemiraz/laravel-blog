<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('back-end.admin.profile.profile');
    }


    public function userimage($request)
    {
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
                $imageName = Auth::user()->image;
            }
            return $imageName;
    }

    public function updateProfile (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image',
            'address' => 'required'
        ]);

           $imageName = $this->userimage($request);

            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imageName;
            $user->address = $request->address;
            $user->save();

            Toastr::success('Profile updated successfully', 'Success');
            return redirect()->back();
          
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $dataPassword = Auth::user()->password;

        if(Hash::check($request->old_password, $dataPassword)) {
            if(!Hash::check($request->password, $dataPassword)) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();

                Toastr::success('Password changed successfully', 'Success');
                return redirect()->back();
            }
            else {
                Toastr::error('New password can not be same as old password', 'Error');
                return redirect()->back();
            }
        }
        else {
            Toastr::error('Current password is invalid', 'Error');
            return redirect()->back();
        }
    }





}
