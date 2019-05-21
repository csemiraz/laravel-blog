<?php

namespace App;

use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

use Image;

class Post extends Model
{
    /* Relationship */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    public static function validatePost($request)
    {
        $request->validate([
            'categories' => 'required',
            'tags' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            'publication_status' => 'required',
        ]);
    }

    public static function imageFile($request) {
        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image))
        {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $singleImage = 'assets/images/post/single/';
            if(!file_exists($singleImage)) {
                mkdir($singleImage, 666, true);
            }

            Image::make($image)->resize(800, 533)->save($singleImage.$imageName);

            $gridPath = 'assets/images/post/grid/';
            if(!file_exists($gridPath)) {
                mkdir($gridPath, 666, true);  
            } 
            
            Image::make($image)->resize(300,200)->save($gridPath.$imageName);
            
        }
        else{
            $imageName = 'post.jpg';
        }
        return $imageName;

    }

    public static function storePost($request, $imageName)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->user_id = Auth::id();
        $post->description = $request->description;
        $post->image = $imageName;
        $post->publication_status = $request->publication_status;
        $post->approval_status = true;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
    }

    public static function updateValidatePost($request)
    {
        $request->validate([
            'categories' => 'required',
            'tags' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif',
            'publication_status' => 'required',
        ]);
    }

    public static function updateImageFile($request) {
        $post = Post::find($request->post_id);
        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image))
        {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $singleImage = 'assets/images/post/single/';
            if(!file_exists($singleImage)) {
                mkdir($singleImage, 666, true);
            }

            if(file_exists($singleImage.$post->image)){
                unlink($singleImage.$post->image);
            }

            Image::make($image)->resize(800, 533)->save($singleImage.$imageName);

            $gridPath = 'assets/images/post/grid/';
            if(!file_exists($gridPath)) {
                mkdir($gridPath, 666, true);  
            } 

            if(file_exists($gridPath.$post->image)){
                unlink($gridPath.$post->image);
            }
            
            Image::make($image)->resize(300,200)->save($gridPath.$imageName);
            
        }
        else{
            $imageName = $post->image;
        }
        return $imageName;
    }

    public static function updatePostInfo($request, $imageName)
    {
        $post = Post::find($request->post_id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->user_id = Auth::id();
        $post->description = $request->description;
        $post->image = $imageName;
        $post->publication_status = $request->publication_status;
        $post->approval_status = true;
        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
    }



}
