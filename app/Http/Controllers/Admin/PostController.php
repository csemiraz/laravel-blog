<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    public function managePost() {
        $posts = Post::latest()->get();
        return view('back-end.admin.post.manage-post', [
            'posts' => $posts,
        ]);
    }

    public function addPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('back-end.admin.post.add-post', compact('categories', 'tags'));
    }

    public function newPost(Request $request)
    {
        Post::validatePost($request);
        $imageName = Post::imageFile($request);
        Post::storePost($request, $imageName);

        Toastr::success('Post info saved successfully');
        return redirect()->route('manage-post');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('back-end.admin.post.edit-post', compact('post', 'categories', 'tags'));
    }

    public function updatePost(Request $request)
    {
        Post::updateValidatePost($request);
        $imageName = Post::updateImageFile($request);
        Post::updatePostInfo($request, $imageName);

        Toastr::success('Post info updated successfully');
        return redirect()->route('manage-post');
    }

    public function unpublishPost($id)
    {
        $post = Post::find($id);
        $post->publication_status = 0;
        $post->save();

        Toastr::success('Post info unpublished successfully');
        return redirect()->route('manage-post');
    }

    public function publishPost($id)
    {
        $post = Post::find($id);
        $post->publication_status = 1;
        $post->save();

        Toastr::success('Post info published successfully');
        return redirect()->route('manage-post');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if($post->image){
            if(file_exists('assets/images/post/single/'.$post->image)){
                unlink('assets/images/post/single/'.$post->image);
            }
            if(file_exists('assets/images/post/grid/'.$post->image)){
                unlink('assets/images/post/grid/'.$post->image);
            }
        }

        $post->categories()->detach();
        $post->tags()->detach();

        $post->delete();
        Toastr::success('Post info deleted successfully');
        return redirect()->back();
    }

    public function detailsPost ($id)
    {
        $post = Post::find($id);
        return view('back-end.admin.post.details-post', compact('post'));
    }

    public function pendingPost()
    {
        $posts = Post::where('approval_status', false)->latest()->get();
        return view('back-end.admin.post.pending-post', compact('posts'));
    }

    public function approvePost($id)
    {
        $post = Post::find($id);
        $post->approval_status = true;
        $post->save();

        Toastr::success('Post approved successfully', 'Success');
        return redirect()->back();
    }




}
