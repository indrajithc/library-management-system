@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 

                <div class="card-body">
                    
                    

                <form method="POST" action="{{ route('librarian.student.update', ['book' => $student_book['id']]) }}">
                        @csrf
                        {{ method_field('PUT')}}



 
                            <div class="col-sm-12 col-md-6">





       <div class="form-group row">
                                                          <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Select Days') }}</label>

                                                          <div class="col-md-6"> 

                                                              <select  id="days" type="text" class="form-control @error('days') is-invalid @enderror  select2" name="days" value="{{ old('days') }}" required autocomplete="name"  autofocus>


 
                                                                  <option

                                        @if( $student_book['days'] == "7")

                                       selected 

                                        @endif


                                                                   value="7"> one week</option>
                                                                  <option


                                        @if( $student_book['days'] == "14")

                                       selected 

                                        @endif

                                                                   value="14"> two weeks</option>
 
                                                              </select>

                                                              @error('days')
                                                                  <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $message }}</strong>
                                                                  </span>
                                                              @enderror
                                                          </div>
                                                      </div>




 

                </div>  



 
                            <div class="col-sm-12 col-md-6">





       <div class="form-group row">
                                                          <label for="returned" class="col-md-4 col-form-label text-md-right">{{ __('Select Days') }}</label>

                                                          <div class="col-md-6"> 

                                                              <select  id="returned" type="text" class="form-control @error('returned') is-invalid @enderror  " name="returned" value="{{ old('returned') }}" required autocomplete="returned"  autofocus>


 
                                                                  <option 
                                                                    @if( $student_book['returned'] == "yes")

                                       selected 

                                        @endif

                                                                  value="yes"> Yes</option>
                                                                  <option 
                                                                    @if( $student_book['returned'] == "no")

                                       selected 

                                        @endif

                                                                  value="no"> No</option>
 
                                                              </select>

                                                              @error('returned')
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
