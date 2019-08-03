@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">View All Books</div>

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
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $books as $book)
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
      <td class="d-flex">

      <a href="{{ route('librarian.student.edit', $book['id']) }}">
      <button type="button" class="btn btn-sm btn-primary">Edit</button>
      </a>

                          

      <form method="POST" action="{{ route('librarian.student.destroy',   $book['id'] ) }}">
                        @csrf
                        {{ method_field('DELETE')}}

                        <button type="submit" class="btn btn-sm btn-danger">delete</button>


      </form>
      
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
