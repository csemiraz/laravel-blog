<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /* Relationship */
    public function posts() 
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }



    public static function validateTag($request) {
        $request->validate([
            'tag_name' => 'required|unique:tags|min:2|max:20|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'publication_status' => 'required'
        ]);
    }

    public static function storeTag($request)
    {
        $tag = new Tag();
        $tag->tag_name = $request->tag_name;
        $tag->slug = str_slug($request->tag_name);
        $tag->publication_status = $request->publication_status;
        $tag->save();
    }

    public static function updateTagInfo($request)
    {
        $tag = Tag::find($request->tag_id);
        $tag->tag_name = $request->tag_name;
        $tag->slug = str_slug($request->tag_name);
        $tag->publication_status = $request->publication_status;
        $tag->save();
    }

}
