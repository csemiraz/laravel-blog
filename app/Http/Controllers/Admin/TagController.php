<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
//use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TagController extends Controller
{
    public function manageTag() {
        $tags = Tag::latest()->get();
        return view('back-end.admin.tag.manage-tag', [
            'tags' => $tags
        ]);
    }
    public function addTag() {
        return view('back-end.admin.tag.add-tag');
    }

    public function newTag(Request $request) {
        Tag::validateTag($request);
        Tag::storeTag($request);
        Toastr::success('Tag info saved successfully', 'Success');
        return redirect()->back();
    }

    public function unpublishTag ($id) {
        $tag = Tag::find($id);
        $tag->publication_status = 0;
        $tag->save();
        
        Toastr::success('Tag info unpublished successfully', 'Success');
        return redirect()->back();
    }

    public function publishTag ($id) {
        $tag = Tag::find($id);
        $tag->publication_status = 1;
        $tag->save();
        
        Toastr::success('Tag info published successfully', 'Success');
        return redirect()->back();
    }

    public function editTag ($id) {
        $tag = Tag::find($id);
        return view('back-end.admin.tag.edit-tag',[
            'tag' => $tag
        ]);
    }

    public function updateTag(Request $request) {
        Tag::validateTag($request);
        Tag::updateTagInfo($request);

        Toastr::success('Tag info updated successfully', 'Success');
        return redirect()->route('manage-tag');
    }

    public function deleteTag($id) {
        $tag = Tag::find($id);
        $tag->delete();
        Toastr::success('Tag info deleted successfully', 'Success');
        return redirect()->route('manage-tag');
    }


}
