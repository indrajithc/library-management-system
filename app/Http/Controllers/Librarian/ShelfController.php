<?php


namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\shelf; 

class ShelfController extends Controller
{
    
    public function index()
    {
         return view( 'librarian.shelf.index')->with('shelfs', shelf::all());
    }
 
     public function create()
     {

         return view( 'librarian/shelf/create');
     }

 
     public function store(Request $request)
     {
         //


          
         $categories = shelf::all();

         $is_exi = false; 
         foreach ($categories as $key => $value) {
            
             if( $value->name == $request->name   ){  
                     $is_exi = true; 
             }   
         }

         if($is_exi) { 
           return  redirect()->route( 'librarian.shelf.create')->with( 'warning',  "shelf already exists" ); 
         }  
         


         

         
         shelf::create([
             'name' => $request->name, 
             'rows' => $request->rows, 
             'area' => $request->area, 
             'description' => $request->description
         ]);



         

         return redirect()->route('librarian.shelf.index')->with("success", "success");
     }
 
     public function show($id)
     {
         //
     }

 
     public function edit($id)
     { 

         return view( 'librarian.shelf.edit')->with( 'shelf', shelf::find($id) );
     
         
     }
 
     public function update(Request $request, $id)
     { 

         $shelf = shelf::find($id);

         $shelf->name=$request->name;
         $shelf->rows=$request->rows;
         $shelf->area=$request->area;
         $shelf->description=$request->description;


         $shelf->save();

         return redirect()->route('librarian.shelf.index')->with("success", "success");
         
     }
 
     public function destroy($id)
     {
         $shelf=shelf::findOrFail($id);
        $shelf->delete();
        return redirect()->route('librarian.shelf.index')->with("success", "success");
     }
 }
    