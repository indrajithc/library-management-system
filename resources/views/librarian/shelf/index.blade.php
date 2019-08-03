@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View All Shelfs</div>

                <div class="card-body">
                    
                    
                <table class="table">
  <thead>
    <tr> 
      <th scope="col">id</th>
      <th scope="col">rows</th>
      <th scope="col">area</th> 
      <th scope="col">description</th> 
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $shelfs as $shelf)
    <tr> 
      <td>{{ $shelf->name }}</td>
      <td>{{ $shelf->rows }}</td>
      <td>{{ $shelf->area }}</td>
      <td>{{ $shelf->description }}</td> 
      <td class="d-flex">

      <a href="{{ route('librarian.shelf.edit', $shelf->id) }}">
      <button type="button" class="btn btn-sm btn-primary">Edit</button>
      </a>

                          

      <form method="POST" action="{{ route('librarian.shelf.destroy',   $shelf->id ) }}">
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
