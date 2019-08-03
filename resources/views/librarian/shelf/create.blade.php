@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Shelf</div>

                <div class="card-body">
                    


      
                <form method="POST" action="{{ route('librarian.shelf.store' ) }}">
                        @csrf
                        {{ method_field('POST')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shelf Id') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                             <div class="form-group row">
                            <label for="rows" class="col-md-4 col-form-label text-md-right">{{ __('Number of Rows') }}</label>

                            <div class="col-md-6">
                                <input id="rows" type="number" class="form-control @error('rows') is-invalid @enderror" name="rows" value="{{ old('rows') }}" required autocomplete="rows" autofocus>

                                @error('rows')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 

 <div class="form-group row">
     <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area / Roll No') }}</label>

     <div class="col-md-6">
         <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>

         @error('area')
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
@endsection
