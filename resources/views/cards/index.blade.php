@extends('layout')

@section('content')
    <h1>All Cards</h1>

    @foreach ($cards as $card)
        <div>
            <a href="http://localhost/project_name/public/cards/{{ $card->id }}">{{ $card->title }}</a>
        </div>
    @endforeach
    <div style="margin-top: 200px">
        <a href="http://localhost/project_name/public/profiles">Profiles Page</a>
    </div>
@stop