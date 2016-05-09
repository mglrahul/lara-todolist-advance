@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">


        <div class="panel panel-default">
            <div class="panel-heading">
                Update Profile
            </div>
            @if (count($users) > 0)



            <?php //echo $users->id; echo '<pre>'; print_r($users); exit; ?>
            <div class="panel-body">



                <!-- New user Form -->
                <form action="{{url('/profile-update/')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- User full Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="user-name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="user-name" class="form-control" value="{{ $users->name }}">


                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="user-name" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-6">
                            <input type="text" name="email" id="user-email" class="form-control" value="{{ $users->email }}">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="user-gender" class="col-sm-3 control-label">Gender</label>

                        <div class="col-sm-6">
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="user-email" value="m" <?php if($users->gender== "m") { echo 'checked="checked"'; } ?> >Male
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="user-email" value="f" <?php if($users->gender== "f") { echo 'checked="checked"'; } ?> >Female
                                </label>
                            </div>
                            <div class="help-block" style="margin-top:35px;">
                            @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="user-image" class="col-sm-3 control-label">Image</label>
                        
                        <div class="col-sm-6">
                            <input type="file" name="image" id="user-email" class="form-control" value="{{ $users->image }}">
                            @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user-current-image" class="col-sm-3 control-label">Current Image</label>
                        <?php $currentImage = ($users->image!=null)?$users->image:'demo_image.jpg';?>
                        <div class="col-sm-6">
                            <img src="{{ asset('uploads/images/'.$currentImage) }}" class="thumb" alt="profile picture" width="304" height="236"/>
                        </div>
                    </div>
                    <!-- Add user Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-edit"></i>Update
                            </button>
                        </div>
                    </div>
                </form>

                @else
                <div class="text-danger text-center">No record found</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
