<?php
/*
class RegistersUsers 
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
} */


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    $people = ['Taylor', 'Matt', 'Jeffrey'];

    return view('welcome')->with(['people' => $people]); 
});

Route::get('about', function() {
    return view('pages.about'); //resources/views/pages/about.blade.php
}); */

Route::get('/begin', function (){
    //Session::flash('status', 'Hello There');
    flash('You are now signed in!', 'success');

    return redirect('/');
});
//Route::get('/', 'PagesController@home');
Route::get('/', function() {
    return view('welcome');
});
Route::get('about', 'PagesController@about');

Route::get('cards', 'CardsController@index');
Route::get('cards/{card}', 'CardsController@show');

Route::post('/cards/{card}/notes', 'NotesController@store')->name('cards.notes.post');

Route::get('notes/{note}/edit', 'NotesController@edit')->name('notes.edit.get');
Route::patch('/notes/{note}', 'NotesController@update')->name('notes.edit.patch');

Route::auth();

Route::get('/dashboard', 'HomeController@index');

Route::get('profiles', 'ProfilesController@index');
Route::get('profiles/{profileid}', 'ProfilesController@show');

