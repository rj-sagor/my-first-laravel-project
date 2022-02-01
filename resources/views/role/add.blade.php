@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-success"><h5>User role</h5></div>
                <div class="card-body">
                  @if(session('InsErr'))
                  <div class="alert alert-warning alert-dismissible fade show t" role="alert">
                <strong>{{session('InsErr') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
               
                 <form action="{{url('/roleuser')}}" method="post">
                     @csrf 

                    <div class="mb-3">
                        <input type="text" name="role"  class="form-control" placeholder="Enter user role">
                    </div>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-success"><h5>User role</h5></div>
                <div class="card-body">
                    <table class="table table-bordered">
                       
                    <thead>
                        <th>sl</th>
                        <th>Role name</th>
                        <th>status</th>
                        <th>create_at</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        @forelse($data as $data)
                          <tr>
                             <td>{{$loop->index}}</td>
                             <td>{{$data->role}}</td>
                             <td>{{$data->status}}</td>
                             <td>{{$data->created_at->diffForHumans()}}</td>
                          </tr>
                          @empty
                          <tr>
                          <td class="text-danger  text-center" colspan="10">no data added yet</td>
                          </tr>
                         

                        @endforelse
                    </tbody>

                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>



@endsection