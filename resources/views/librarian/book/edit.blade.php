@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-capitalize">Edit {{ $books->name }} details</div>

                <div class="card-body">
                    
                    

                <form method="POST" action="{{ route('librarian.book.update', ['book' => $books->id]) }}">
                        @csrf
                        {{ method_field('PUT')}}



 






<div class="row">
                            <div class="col-sm-12 col-md-6">




                            <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Book Category') }}</label>

                            <div class="col-md-6"> 

                                <select  id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category"  required autocomplete="name"  autofocus>



  @foreach( $categories as $category)

                                    <option value="{{ $category->id}}" 

                                        @if( $category->id == $books->category)

                                       selected 

                                        @endif

                                        >{{ $category->name}}</option>

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


                                 <select  id="shelf" type="number" class="form-control @error('shelf') is-invalid @enderror" name="shelf"    required autocomplete="rows" >



  @foreach( $shelfs as $shelf)

                                    <option value="{{ $shelf->id}}" 


 @if( $shelf->id == $books->shelf)

                                       selected 

                                        @endif


                                        >{{ $shelf->name}}</option>

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
                                <input id="book_id" type="text" class="form-control @error('book_id') is-invalid @enderror" name="book_id" value="{{ $books->book_id }}" required autocomplete="rows"  >

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $books->name }}" required autocomplete="name"  >

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
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $books->author }}" required autocomplete="author"  >

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
                                <input id="edition" type="number" class="form-control @error('edition') is-invalid @enderror" name="edition" value="{{ $books->edition }}"required autocomplete="edition"  >

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
                                <textarea  id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value=""  autocomplete="description">{{ $books->description }}</textarea>
                              

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
                                    {{ __('Update') }}
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
@endsection
