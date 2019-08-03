<?php




namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use App\User; 
use App\book; 
use App\book_category; 
use App\shelf; 
use App\student_book; 



class StudentBookController extends Controller{
    
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
  
         return view( 'librarian/student/index')
         ->with('books',  $new_books )
         ->with('student_book',  $student_book ) 
            
         ;
    }
    
     public function create()
     {

                $booksd = book::all( )->toArray();

$new_books = [];

foreach ($booksd as $key => $value) {
  $value["category" ] = book_category::find($value["category"])->toArray();
  $value["shelf" ] = shelf::find($value["shelf"])->toArray();
  array_push($new_books, $value);
} 
 

         return view( 'librarian/student/create')->with('books',  $new_books )->with('students',  User::select()->where('type', "students")->get()) ;
     }

 
     public function store(Request $request)
     {
         //


          
         $student_book = student_book::all();

         $is_exi = false; 
         foreach ($student_book as $key => $value) {
            
             if( 
                $value->book == $request->book &&    
                $value->returned != "yes"   
            ){  
                     $is_exi = true; 
             }   
         }

         if($is_exi) { 
           return  redirect()->route( 'librarian.student.create')->with( 'warning',  "book is not available." ); 
         }  
         

 



         
        student_book::create([
             'student' => $request->student, 
             'book' => $request->book, 
             'days' => $request->days, 
             'returned' => 'no',  
             'description' => $request->description
         ]);



         

         return redirect()->route('librarian.student.index')->with("success", "success");
     }
 
     public function show($id)
     {
         //
     }

 
     public function edit($id)
     { 


        $booksd = book::all( )->toArray();
        $student_book = student_book::find($id)->toArray();

$new_books = [];


foreach ( array($student_book) as $key => $value) {

  $value["book" ] = book::find($value["book"])->toArray();  
  $value["category" ] = book_category::find($value["book" ]["category"])->toArray(); 
  $value["student" ] = User::find($value["student"])->toArray();
  array_push($new_books, $value);
} 

  

  
         return view( 'librarian/student/edit')
         ->with('book',  $new_books[0] )
         ->with('student_book',  $student_book ) 
            
         ;



  
 
     
         
     }
 
     public function update(Request $request, $id)
     { 

         $book =student_book::find($id);

         $book->days=$request->days;
         $book->returned=$request->returned; 


         $book->save();

         return redirect()->route('librarian.student.index')->with("success", "success");
         
     }
 
     public function destroy($id)
     {
         $book=student_book::findOrFail($id);
        $book->delete();
        return redirect()->route('librarian.student.index')->with("success", "success");
     }
 }
    