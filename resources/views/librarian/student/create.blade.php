@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add New Shelf</div>

                <div class="card-body">
                    

 

      
                <form method="POST" action="{{ route('librarian.student.store' ) }}">
                        @csrf
                        {{ method_field('POST')}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6">




                 

           <div class="form-group row">
                            <label for="book" class="col-md-4 col-form-label text-md-right">{{ __('Select Book') }}</label>

                            <div class="col-md-6"> 

                                <select  id="book" type="text" class="form-control @error('book') is-invalid @enderror  select2" name="book" value="{{ old('book') }}" required autocomplete="name"  autofocus>



  @foreach( $books as $book)

                                    <option value="{{ $book['id']}}">{{ $book['name']}} - {{ $book['book_id']}}</option>

                                    @endforeach
                                </select>

                                @error('book')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



       <div class="form-group row">
                                                          <label for="student" class="col-md-4 col-form-label text-md-right">{{ __('Select Student') }}</label>

                                                          <div class="col-md-6"> 

                                                              <select  id="student" type="text" class="form-control @error('student') is-invalid @enderror  select2" name="student" value="{{ old('student') }}" required autocomplete="name"  autofocus>



                                @foreach( $students as $student)

                                                                  <option value="{{ $student->id}}">{{ $student->name}} - {{ $student->email }}</option>

                                                                  @endforeach
                                                              </select>

                                                              @error('student')
                                                                  <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                  </span>
                                                              @enderror
                                                          </div>
                                                      </div>

</div>



                            <div class="col-sm-12 col-md-6">





       <div class="form-group row">
                                                          <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Select Days') }}</label>

                                                          <div class="col-md-6"> 

                                                              <select  id="days" type="text" class="form-control @error('days') is-invalid @enderror  select2" name="days" value="{{ old('days') }}" required autocomplete="name"  autofocus>


 
                                                                  <option value="7"> one week</option>
                                                                  <option value="14"> two weeks</option>
 
                                                              </select>

                                                              @error('days')
                                                                  <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                  </span>
                                                              @enderror
                                                          </div>
                                                      </div>


 







 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Assign') }}
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
