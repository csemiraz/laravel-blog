@extends('back-end.master')
@section('title')
Post : Details Post
@endsection

@section('mainContent')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
            
            @if($post->approval_status == false)
            <button type="button" class="btn btn-success float-right">
                <i class="fas fa-check"></i>
                <span>Approve</span>
            </button>
            @else
            <button type="button" class="btn btn-success float-right" disabled>
                <i class="fas fa-check"></i>
                <span>Approved</span>
            </button>
            @endif

            <hr>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        {{ $post->title }}
                    </h4>
                    <span>Posted by <strong><a href="">{{ $post->user->name }}</a></strong> On {{ $post->created_at->toFormattedDateString() }}</span>
                </div>
                <div class="card-body">
                    {!! $post->description !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-info text-light">
                            <h5>Categories</h5>
                        </div>
                        <div class="card-body">
                            @foreach($post->categories as $category)
                                <span class="btn btn-info">{{ $category->category_name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-success text-light">
                            <h5>Tags</h5>
                        </div>
                        <div class="card-body">
                            @foreach($post->tags as $tag)
                                <span class="btn btn-success">{{ $tag->tag_name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-light">
                            <h4>Featured Image</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('assets/images/post/grid/'.$post->image) }}" alt="post-image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection