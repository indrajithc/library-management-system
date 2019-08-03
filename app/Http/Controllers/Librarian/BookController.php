<?php





namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use App\book; 
use App\book_category; 
use App\shelf; 


class BookController extends Controller {
    
    public function index()
    {


        $booksd =  book::all( )->toArray();

$new_books = [];

foreach ($booksd as $key => $value) {
  $value["category" ] = book_category::find($value["category"])->toArray();
  $value["shelf" ] = shelf::find($value["shelf"])->toArray();
  array_push($new_books, $value);
}

 
 
         return view( 'librarian/book/index')->with('books',  $new_books ) ;
    }
    
     public function create()
     {

         return view( 'librarian/book/create')->with('categories', book_category::all())->with('shelfs', shelf::all());
     }

 
     public function store(Request $request)
     {
         //


          
         $categories = book::all();

         $is_exi = false; 
         foreach ($categories as $key => $value) {
            
             if( $value->book_id == $request->book_id   ){  
                     $is_exi = true; 
             }   
         }

         if($is_exi) { 
           return  redirect()->route( 'librarian.book.create')->with( 'warning',  "book id already exists" ); 
         }  
         


         
         $is_exi = false; 
         foreach ($categories as $key => $value) {
            
             if( 
                $value->name == $request->name &&     
                $value->author == $request->author &&     
                $value->edition == $request->edition      

             ){  
                     $is_exi = true; 
             }   
         }

         if($is_exi) { 
           return  redirect()->route( 'librarian.book.create')->with( 'warning',  "book already exists" ); 
         }  
         



         
         book::create([
             'category' => $request->category, 
             'shelf' => $request->shelf, 
             'book_id' => $request->book_id, 
             'name' => $request->name, 
             'author' => $request->author, 
             'edition' => $request->edition, 
             'description' => $request->description
         ]);



         

         return redirect()->route('librarian.book.index')->with("success", "success");
     }
 
     public function show($id)
     {
         //
     }

 
     public function edit($id)
     { 

 

              return view( 'librarian/book/edit')->with( 'books', book::find($id) )->with('categories', book_category::all())->with('shelfs', shelf::all());
 
     
         
     }
 
     public function update(Request $request, $id)
     { 

         $book = book::find($id);

         $book->category=$request->category;
         $book->shelf=$request->shelf;
         $book->book_id=$request->book_id;
         $book->name=$request->name;
         $book->author=$request->author;
         $book->edition=$request->edition;
         $book->description=$request->description;


         $book->save();

         return redirect()->route('librarian.book.index')->with("success", "success");
         
     }
 
     public function destroy($id)
     {
         $book=book::findOrFail($id);
        $book->delete();
        return redirect()->route('librarian.book.index')->with("success", "success");
     }
 }
    