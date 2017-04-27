@extends('layout')

@section('content')
    <div class="row">    
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $profile->fname }} {{ $profile->lname }}'s Profile Page</h1>

            <form method="POST" action="{{route('profile.patch',['profile_id'=>$profile->id])}}">
                {{ method_field('PATCH')}}

                <div class="form-group">
                    <label for="fname">First Name:</label><br />
                    <input type="text" class="form-control" name="fname" placeholder="{{ $profile->fname }}">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label><br />
                    <input type="text" class="form-control" name="lname" placeholder="{{ $profile->lname }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br />
                    <input type="email" class="form-control" name="email" placeholder="{{ $profile->email }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop