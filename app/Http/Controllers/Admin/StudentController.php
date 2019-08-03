<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'admin.students.index')->with('users', User::select()->where('type', "students")->get());    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view( 'admin/students/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

         
        $users = User::all();
        $is_exi = false; 
        foreach ($users as $key => $value) {
           
            if( $value->email == $request->email   ){  
                    $is_exi = true; 
            }   
        }

        if($is_exi) { 
          return  redirect()->route( 'admin.students.create')->with( 'warning',  "email already exists" ); 
        }  
        

        
        User::create([
            'name' => $request->name,
            'type' => "students",
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        
        

        return redirect()->route('admin.students.index')->with("success", "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth::user()->id == $id) {
            return redirect()->route('admin.students.index')->with("warning", "not update your own data");
        } 

        return view( 'admin.students.edit')->with( 'user', User::find($id) );
    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

               if(Auth::user()->id == $id) {
            return redirect()->route('admin.students.index');
        } 

        $user = User::find($id);

        $user->name=$request->name;
        // $user->type=$request->type;
        $user->email=$request->email;


        $user->save();

        return redirect()->route('admin.students.index')->with("success", "success");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
       $user->delete();
       return redirect()->route('admin.students.index')->with("success", "success");
    }
}
