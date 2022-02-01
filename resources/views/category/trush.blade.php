@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
       

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-success"><h5>trash  list</h5></div>
                <div class="card-body">
                    <table class="table table-bordered">
                       
                    <thead>
                        <th>sl</th>
                        <th>Category name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        
                  
                        @forelse($all_trushed as $trush)
                          <tr>
                             <td>{{$loop->index}}</td>
                             <td>{{$trush->category_name}}</td>
                             
                             <td>
                                 <a href="{{route('category.restore',$trush->id)}}"class="btn btn-sm btn-warning">restore</a>
                                 <a href="{{route('category.parmanentdelete',$trush->id)}}"class="btn btn-sm btn-danger">Delete</a>
                             </td>
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