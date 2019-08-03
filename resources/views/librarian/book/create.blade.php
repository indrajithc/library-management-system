@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add New Shelf</div>

                <div class="card-body">
                    

 

      
                <form method="POST" action="{{ route('librarian.book.store' ) }}">
                        @csrf
                        {{ method_field('POST')}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6">




                            <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Book Category') }}</label>

                            <div class="col-md-6"> 

                                <select  id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="name"  autofocus>



  @foreach( $categories as $category)

                                    <option value="{{ $category->id}}">{{ $category->name}}</option>

                                    @endforeach
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


    <div class="form-group row">
                            <label for="shelf" class="col-md-4 col-form-label text-md-right">{{ __('Shelf') }}</label>

                            <div class="col-md-6"> 


                                 <select  id="shelf" type="number" class="form-control @error('shelf') is-invalid @enderror" name="shelf" value="{{ old('shelf') }}" required autocomplete="rows" >



  @foreach( $shelfs as $shelf)

                                    <option value="{{ $shelf->id}}">{{ $shelf->name}}</option>

                                    @endforeach
                                </select>



                                @error('shelf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




    <div class="form-group row">
                            <label for="book_id" class="col-md-4 col-form-label text-md-right">{{ __('Book Id') }}</label>

                            <div class="col-md-6">
                                <input id="book_id" type="text" class="form-control @error('book_id') is-invalid @enderror" name="book_id" value="{{ old('book_id') }}" required autocomplete="rows"  >

                                @error('book_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Book Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                </div> 

                            <div class="col-sm-12 col-md-6">









                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required autocomplete="author"  >

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>








                        <div class="form-group row">
                            <label for="edition" class="col-md-4 col-form-label text-md-right">{{ __('Book Edition') }}</label>

                            <div class="col-md-6">
                                <input id="edition" type="number" class="form-control @error('edition') is-invalid @enderror" name="edition" value="{{ old('edition') }}" required value="1" autocomplete="edition"  >

                                @error('edition')edition
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                         
 

 

    


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea  id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description"></textarea>
                              

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
 



                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
