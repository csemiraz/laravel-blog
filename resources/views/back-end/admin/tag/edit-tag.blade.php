@extends('back-end.master')
@section('title')
    Edit Tag
@endsection

@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Edit Tag
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-tag') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Tag Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="tag_name" class="form-control" value="{{ $tag->tag_name }}">
                                    <input type="hidden" name="tag_id" class="form-control" value="{{ $tag->id }}">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="" class=" col-form-label col-md-3">Publication Status</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" name="publication_status" class=" form-check-input" value="1" {{ $tag->publication_status==1 ? 'checked' : '' }}>
                                        <label class="form-check-label" >Publish</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="publication_status" class=" form-check-input" value="0" {{ $tag->publication_status==0 ? 'checked' : '' }}>
                                        <label class="form-check-label" >Unpublish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <input type="submit" class="btn btn-success" value="Update Tag">
                            </div>
                            <div class="">
                                <a href="{{ route('manage-tag') }}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection