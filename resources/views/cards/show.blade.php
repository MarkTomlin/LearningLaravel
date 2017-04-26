@extends('layout')

@section('content')
    <div class="row">    
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $card->title }}</h1>
            
            <ul class="list-group">
                @foreach ($card->notes as $note)
                    <li class="list-group-item">
                        {{ $note->body }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Author: {{ $note->user->username }}
                        <a href="{{route('notes.edit.get',['note_id'=>$note->id])}}" style="float:right">EDIT</a> 
                    </li>
                @endforeach
            </ul>

            <hr>
            <h3>Add a New Note</h3>

            <form method="POST" action="{{route('cards.notes.post',['card_id'=>$card->id])}}">
                {{ csrf_field() }}  <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                <div class="form-group">
                    <textarea name="body" class="form-control">{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Note</button>
                </div>
            </form>

            @if (count($errors))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@stop