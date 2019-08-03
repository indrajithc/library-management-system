@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View All Books</div>

                <div class="card-body">
                    
                    
                <table class="table">
  <thead>
    <tr> 

 

      <th scope="col">category</th>
      <th scope="col">shelf</th>
      <th scope="col">book_id</th> 
      <th scope="col">name</th> 
      <th scope="col">author</th>
      <th scope="col">edition</th>
      <th scope="col">description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $books as $book)
    <tr> 
      <td>{{ $book["category"]["name"] }}</td>
      <td>{{ $book["shelf"]["name"] }}</td>
      <td>{{ $book["book_id"] }}</td>
      <td>{{ $book["name"] }}</td>
      <td>{{ $book["author"] }}</td>
      <td>{{ $book["edition"] }}</td>
      <td>{{ $book["description"] }}</td> 
      <td class="d-flex">

      <a href="{{ route('librarian.book.edit', $book['id']) }}">
      <button type="button" class="btn btn-sm btn-primary">Edit</button>
      </a>

                          

      <form method="POST" action="{{ route('librarian.book.destroy',   $book['id'] ) }}">
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
