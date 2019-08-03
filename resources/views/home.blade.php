@extends('layouts.app')

@section('content')
<div class="container">



                            @if (  Auth::user()->type == "admin"  )
                           



                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Dashboard</div>

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            You are logged in!
                                        </div>
                                    </div>
                                </div>
                            </div>



                           @endif





                            @if (  Auth::user()->type == "librarian"  )
                           



                            <div class="row ">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Assign Books </div> 

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            You are logged in!
                                        </div>
                                    </div>
                                </div>
                            </div>



                           @endif
















                            @if (  Auth::user()->type == "students"  )
                           



                            <div class="row ">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">Assigned Books </div> 

                                       




<div class="card-body">

                                                            
                                                        <table class="table">
                                          <thead>
                                            <tr> 

                                         

                                              <th scope="col">student</th>
                                              <th scope="col">email</th>
                                              <th scope="col">category</th> 
                                              <th scope="col">book_id</th> 
                                              <th scope="col">name</th> 
                                              <th scope="col">author</th>
                                              <th scope="col">days</th>
                                              <th scope="col">returned</th>
                                              <th scope="col">took at</th> 
                                            </tr>
                                          </thead>
                                          <tbody>
                                          @foreach( $books as $book)
                                           @if( $book["student"]["id"] == Auth::user()->id)

                                           <tr> 
                                             <td>{{ $book["student"]["name"] }}</td>
                                             <td>{{ $book["student"]["email"] }}</td>
                                             <td>{{ $book["category"]["name"] }}</td>
                                             <td>{{ $book["book"]["book_id"] }}</td>
                                             <td>{{ $book["book"]["name"] }} [ E - {{ $book["book"]["edition"] }} ] </td>
                                             <td>{{ $book["book"]["author"] }}</td>
                                             <td>{{ $book["days"]  }}</td>
                                             <td>{{ $book["returned"] }}</td> 
                                             <td>{{ $book["created_at"] }}</td>
                                            
                                           </tr>
                                           @endif
                                            @endforeach
                                          </tbody>
                                        </table>    







                                    </div>
                                </div>
                            </div>



                           @endif




  
</div>
</div>
@endsection
