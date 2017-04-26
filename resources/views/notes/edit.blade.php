@extends('layout') 

@section('content')
    <h1>Edit the Note</h1>

    <form method="POST" action="{{route('notes.edit.patch',['note_id'=>$note->id])}}">
        {{ method_field('PATCH')}}

        <div class="form-group">
            <textarea name="body" class="form-control">{{ $note->body }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Note</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    <hr>
@stop

<!-- /notes/{{ $note->id }}/ -->