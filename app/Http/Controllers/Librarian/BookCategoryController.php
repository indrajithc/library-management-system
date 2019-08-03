<?php

namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\book_category; 

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view( 'librarian.category.index')->with('book_categories', book_category::all());
    }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {

         return view( 'librarian/category/create');
     }

 
     public function store(Request $request)
     {
         //


          
         $categories = book_category::all();

         $is_exi = false; 
         foreach ($categories as $key => $value) {
            
             if( $value->name == $request->name   ){  
                     $is_exi = true; 
             }   
         }

         if($is_exi) { 
           return  redirect()->route( 'librarian.category.create')->with( 'warning',  "category already exists" ); 
         }  
         


         

         
         book_category::create([
             'name' => $request->name, 
             'description' => $request->description
         ]);



         

         return redirect()->route('librarian.category.index')->with("success", "success");
     }
 
     public function show($id)
     {
         //
     }

 
     public function edit($id)
     { 

         return view( 'librarian.category.edit')->with( 'category', book_category::find($id) );
     
         
     }
 
     public function update(Request $request, $id)
     { 

         $category = book_category::find($id);

         $category->name=$request->name;
         // $category->type=$request->type;
         $category->description=$request->description;


         $category->save();

         return redirect()->route('librarian.category.index')->with("success", "success");
         
     }
 
     public function destroy($id)
     {
         $category=book_category::findOrFail($id);
        $category->delete();
        return redirect()->route('librarian.category.index')->with("success", "success");
     }
 }
    