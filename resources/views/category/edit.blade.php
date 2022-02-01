@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <div class="card-header bg-success"><h4>category update</h4></div>
                <div class="card-body">

                
               @if(session('Insdone'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('Insdone') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif 
               
                 <form action="{{route('update.category',$all_category->id)}}" method="post">
                     @csrf 

                    <div class="mb-3">
                        <input type="text" name="category_name"  class="form-control" value="{{$all_category->category_name}}" required>
                    </div>
                    @error('category_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection