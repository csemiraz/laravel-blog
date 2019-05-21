@extends('back-end.master')
@section('title')
    Add Tag
@endsection

@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">
                        Add Tag
                    </div>
                    <div class="card-body">
                        <form action="{{ route('new-tag') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="" class=" col-form-label col-md-3">Tag Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="tag_name" class="form-control">
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
                                <input type="submit" class="btn btn-success" value="Add Tag">
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