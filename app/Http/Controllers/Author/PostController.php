<?php

namespace App\Http\Controllers\Author;

use App\Tag;
use App\Post;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorNewPost;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class PostController extends Controller
{
    public function managePost() {
        $posts = Auth::user()->posts()->latest()->get();
        return view('back-end.author.post.manage-post', [
            'posts' => $posts,
        ]);
    }

    public function addPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('back-end.author.post.add-post', compact('categories', 'tags'));
    }

    public function newPost(Request $request)
    {
        Post::validatePost($request);
        $imageName = Post::imageFile($request);
        
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->user_id = Auth::id();
        $post->description = $request->description;
        $post->image = $imageName;
        $post->publication_status = $request->publication_status;
        $post->approval_status = false;
        
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        /* Send Notification New Post Update To Admin */
        $users = User::where('role_id', 1)->get();
        Notification::send($users, new AuthorNewPost($post));

        Toastr::success('Post info saved successfully');
        return redirect()->back();
    }

    public function editPost($id)
    {
        $post = Post::find($id);

        if($post->user_id != Auth::id()) {
            Toastr::error('Your are not authorized user to action this', 'Error');
            return redirect()->back();
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('back-end.author.post.edit-post', compact('post', 'categories', 'tags'));
    }

    public function updatePost(Request $request)
    {
        Post::updateValidatePost($request);
        $imageName = Post::updateImageFile($request);
        Post::updatePostInfo($request, $imageName);

        Toastr::success('Post info updated successfully');
        return redirect()->route('author.manage-post');
    }

    public function unpublishPost($id)
    {
        $post = Post::find($id);

        if($post->user_id != Auth::id()) {
            Toastr::error('Your are not authorized user to action this', 'Error');
            return redirect()->back();
        }

        $post->publication_status = 0;
        $post->save();

        Toastr::success('Post info unpublished successfully');
        return redirect()->route('author.manage-post');
    }

    public function publishPost($id)
    {
        $post = Post::find($id);

        if($post->user_id != Auth::id()) {
            Toastr::error('Your are not authorized user to action this', 'Error');
            return redirect()->back();
        }

        $post->publication_status = 1;
        $post->save();

        Toastr::success('Post info published successfully');
        return redirect()->route('author.manage-post');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);

        if($post->user_id != Auth::id()) {
            Toastr::error('Your are not authorized user to action this', 'Error');
            return redirect()->back();
        }

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

        if($post->user_id != Auth::id()) {
            Toastr::error('Your are not authorized user to action this', 'Error');
            return redirect()->back();
        }

        return view('back-end.author.post.details-post', compact('post'));
    }

    




}
