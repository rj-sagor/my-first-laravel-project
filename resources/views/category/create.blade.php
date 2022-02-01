@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-success"><h5>category Upload</h5></div>
                <div class="card-body">

                  @if(session('InsErr'))
                  <div class="alert alert-danger alert-dismissible fade show t" role="alert">
                <strong>{{session('InsErr') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>   
                        
               @endif
               @if(session('Insdone'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('Insdone') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
               
                 <form action="{{url('/category/store')}}" method="post">
                     @csrf 

                    <div class="mb-3">
                        <input type="text" name="category_name"  class="form-control" placeholder="Enter your category">
                    </div>
                    @error('category_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection