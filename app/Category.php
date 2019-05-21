<?php

namespace App;

use App\Category;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;



class Category extends Model
{
    protected $fillable = [
        'category_name', 'category_description', 'image', 'publication_status'
    ];
    
    /* Relationship */
    public function posts() 
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }




    public static function validCategory($request) {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'image' => 'image',
            'publication_status' => 'required' 
        ]);
    }

    public static function imageFile($request) {
        $image = $request->file('image');
        $slug = str_slug($request->category_name);

        if(isset($image))
        {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $thumbPath = 'assets/images/category/thumb/';
            if(!file_exists($thumbPath)) {
                mkdir($thumbPath, 666, true);
            }

            Image::make($image)->resize(500, 300)->save($thumbPath.$imageName);

            $sliderPath = 'assets/images/category/slider/';
            if(!file_exists($sliderPath)) {
                mkdir($sliderPath, 666, true);  
            } 
            
            Image::make($image)->resize(800,500)->save($sliderPath.$imageName);
            
        }
        else{
            $imageName = 'category.jpg';
        }
        return $imageName;

    }

    public static function storeCategory($request, $imageName) {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->image = $imageName;
        $category->publication_status = $request->publication_status;
        $category->save();
    }

    public static function updateImageFile($request) {
        $category = Category::find($request->category_id);
        $image = $request->file('image');
        $slug = str_slug($request->category_name);

        if(isset($image))
        {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $thumbPath = 'assets/images/category/thumb/';
            if(!file_exists($thumbPath)) {
                mkdir($thumbPath, 666, true);
            }

            /* Delete old image */
            if(file_exists('assets/images/category/thumb/'.$category->image)) {
                unlink('assets/images/category/thumb/'.$category->image);
            }

            Image::make($image)->resize(500, 300)->save($thumbPath.$imageName);

            $sliderPath = 'assets/images/category/slider/';
            if(!file_exists($sliderPath)) {
                mkdir($sliderPath, 666, true);  
            } 

            /* Delete old image */
            if(file_exists('assets/images/category/slider/'.$category->image)) {
                unlink('assets/images/category/slider/'.$category->image);
            }
            
            Image::make($image)->resize(800,500)->save($sliderPath.$imageName);
            
        }
        else{
            $imageName = $category->image;
        }
        return $imageName;

    }

    public static function updateCategoryInfo($request, $imageName) {
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->image = $imageName;
        $category->publication_status = $request->publication_status;
        $category->save();
    }





}
