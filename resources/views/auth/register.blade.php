@extends('front-end.master')
@section('title')
Register
@endsection

@section('mainContent')
<div class="container my-3 my-sm-5">

    <!-- Register Row -->
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Register
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class=" col-form-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-form-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-form-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control">
                                <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-form-label col-md-3">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control">
                                <span class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class=" col-form-label col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class=" form-control-file">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-form-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" class="form-control" id="" cols="15" rows="7"></textarea>
                                <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ''}}</span>
                            </div>
                        </div>

                        <div class="float-right">
                            <input type="submit" class="btn btn-success" value="Register">
                        </div>
                        <div>
                            <a href="{{ route('/') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Register Row -->

</div>
@endsection