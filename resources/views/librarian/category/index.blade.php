@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View All Categories</div>

                <div class="card-body">
                    
                    
                <table class="table">
  <thead>
    <tr> 
      <th scope="col">name</th>
      <th scope="col">description</th> 
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $book_categories as $category)
    <tr> 
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td> 
      <td class="d-flex">

      <a href="{{ route('librarian.category.edit', $category->id) }}">
      <button type="button" class="btn btn-sm btn-primary">Edit</button>
      </a>

                          

      <form method="POST" action="{{ route('librarian.category.destroy',   $category->id ) }}">
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
