@extends('layout')

@section('content')
    <h1>All Profiles List</h1>

    @foreach ($profiles as $profile)
        <div>
            <a href="http://localhost/project_name/public/profiles/{{ $profile->id }}">
                {{ $profile->fname }} {{ $profile->lname }}
            </a>
        </div>
    @endforeach
@stop