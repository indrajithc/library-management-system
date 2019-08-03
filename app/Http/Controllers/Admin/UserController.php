<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'admin.users.index')->with('users', User::select()->where('type', "librarian")->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view( 'admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



private function send_mail($to, $subject, $message) {

    // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0"."\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

    // More headers
                        $headers .= 'From: Rit <noreply@rit.ac.in>'."\r\n";


                        // if (mail($to, $subject, $message, $headers)) {
                        //  return 1;
                        // } else {
                        //  return 0;
                        // }

                        require_once("classes/class.phpmailer.php");


     // include the class name


            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 465 465
            $mail->IsHTML(true);
            $mail->Username = "test@test.com";
            $mail->Password ="test";
            $mail->SetFrom("admin@lms.com");
            $mail->Subject = $subject;

            $mail->Body = $message;
            $mail->AddAddress($to);//here mailid is fetched from the database
            //$mail->AddAttachment($file_name);
            if($mail->Send()) {
                return 1;
            } else {
                return 0;
            }
            




        }







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
          return  redirect()->route( 'admin.users.create')->with( 'warning',  "email already exists" ); 
        }  
 

 
        User::create([
            'name' => $request->name,
            'type' => "librarian",
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


 
 

        return redirect()->route('admin.users.index')->with("success", "success");
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
            return redirect()->route('admin.users.index')->with("warning", "not update your own data");
        } 

        return view( 'admin.users.edit')->with( 'user', User::find($id) );
    
        
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
            return redirect()->route('admin.users.index');
        } 

        $user = User::find($id);

        $user->name=$request->name;
        // $user->type=$request->type;
        $user->email=$request->email;


        $user->save();

        return redirect()->route('admin.users.index')->with("success", "success");
        


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
       return redirect()->route('admin.users.index')->with("success", "success");
    }
}
