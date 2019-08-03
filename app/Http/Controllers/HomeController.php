<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User; 
use App\book; 
use App\book_category; 
use App\shelf; 
use App\student_book; 




 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 




                $booksd = book::all( )->toArray();
                $student_book = student_book::all( )->toArray();

        $new_books = [];

        foreach ($student_book as $key => $value) {

          $value["book" ] = book::find($value["book"])->toArray();  
          $value["category" ] = book_category::find($value["book" ]["category"])->toArray(); 
          $value["student" ] = User::find($value["student"])->toArray();
          array_push($new_books, $value);
        } 
           


 
         return view( 'home') 
         ->with('books',  $new_books )
                 ->with('student_book',  $student_book )  ; 

    }
}
