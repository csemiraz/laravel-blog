@extends('back-end.master')
@section('title')
Profile : Admin Profile
@endsection

@section('mainContent')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                        role="tab" aria-controls="nav-profile" aria-selected="false">PROFILE UPDATE</a>
                    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab"
                        aria-controls="nav-password" aria-selected="true">CHANGE PASSWORD</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab">
                    <br><hr><br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                                <span
                                                    class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">Image</label>
                                            <div class="col-md-9">
                                                <input type="file" name="image" class=" form-control-file">
                                                <span
                                                    class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">Address</label>
                                            <div class="col-md-9">
                                                <textarea name="address" class="form-control" id="" cols="15"
                                                    rows="7">{{ Auth::user()->address}}</textarea>
                                                <span
                                                    class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ''}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-9 offset-md-3">
                                                <input type="submit" class="btn btn-success" value="Update Profile">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">

                    <br><hr><br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('change-password') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">Old Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="old_password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">New Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label for="" class=" col-form-label col-md-3">Confirm Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                        

                                        <div class="form-group row">
                                            <div class="col-md-9 offset-md-3">
                                                <input type="submit" class="btn btn-success" value="Change Password">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection