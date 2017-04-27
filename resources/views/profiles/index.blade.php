@extends('layout')

@section('content')
    <div class="row">    
        <div class="col-md-6 col-md-offset-3">
            <h1>All Profiles List</h1>

            @foreach ($profiles as $profile)
                <div>
                    <a href="http://localhost/project_name/public/profiles/{{ $profile->id }}/view">
                        {{ $profile->fname }} {{ $profile->lname }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop