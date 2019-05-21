@extends('back-end.master')
@section('title')
   Post : Add Post
@endsection

@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-center">
                        Add Post
                    </div>
                    <div class="card-body">
                        <form action="{{ route('new-post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Categories</label>
                                <div class="col-md-9">
                                    <select name="categories[]" class="form-control selectpicker" data-live-search="true" multiple data-actions-box="true">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Tags</label>
                                <div class="col-md-9">
                                    <select name="tags[]" class="form-control selectpicker" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Post Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Post Description</label>
                                <div class="col-md-9">
                                    <textarea id="editor" name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Featured Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" class=" form-control-file">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class=" col-form-label col-md-3">Publication Status</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" name="publication_status" class=" form-check-input" value="1">
                                        <label class="form-check-label" >Publish</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="publication_status" class=" form-check-input" value="0">
                                        <label class="form-check-label" >Unpublish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <input type="submit" class="btn btn-success" value="Add Post">
                            </div>
                            <div>
                                <a href="{{ route('manage-post') }}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection