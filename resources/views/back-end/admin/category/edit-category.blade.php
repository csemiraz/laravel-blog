@extends('back-end.master')
@section('title')
    Category : Update Category Info
@endsection

@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-center">
                        Update Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Category Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
                                    <input type="hidden" name="category_id" class="form-control" value="{{ $category->id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Category Description</label>
                                <div class="col-md-9">
                                    <textarea name="category_description" class="form-control" id="" cols="15" rows="7">{{ $category->category_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" class=" form-control-file">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class=" col-form-label col-md-3">Publication Status</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" name="publication_status" class=" form-check-input" value="1" {{ $category->publication_status==1 ? 'checked' : ''}}>
                                        <label class="form-check-label" >Publish</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="publication_status" class=" form-check-input" value="0" {{ $category->publication_status==0 ? 'checked' : ''}}>
                                        <label class="form-check-label" >Unpublish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <input type="submit" class="btn btn-success" value="Update Category">
                            </div>
                            <div>
                                <a href="{{ route('manage-category') }}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection