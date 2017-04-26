<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {
        // $note = new Note;
        // $note->body = $request->body;
        // $card->notes()->save($note);

        // $note = new Note(['body' => $request->body]);
        //$note->body = $request->body;
        //$card->notes()->save($note);
        $this->validate($request, [
            'body' => 'required|min:10',
            'email' => 'email|unique:users,email'
        ]);
        
        $note = new Note($request->all());
        //$note->by(Auth::user());
        $card->addNote($note, 1);

        return back();
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        // dd('hit');  // test to see if method accessed
        $note->update($request->all());

        return back();
    }
}
