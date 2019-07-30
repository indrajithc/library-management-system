@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    
                <table class="table">
  <thead>
    <tr> 
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">type</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $users as $user)
    <tr> 
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->type }}</td>
      <td>
      
      <button class="btn btn-sm btn-primary"></button>
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
