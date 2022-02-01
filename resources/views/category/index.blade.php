@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
       

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-success"><h5>category list</h5></div>
                <div class="card-body">
                    <table class="table table-bordered">
                       
                    <thead>
                        <th>sl</th>
                        <th>Category name</th>
                        <th>status</th>
                        <th>create_at</th>
                        <th>added_by</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($all_category as $categories)
                          <tr>
                             <td>{{$loop->index}}</td>
                             <td>{{$categories->category_name}}</td>
                             <td>
                                 @if($categories->status== '1')
                                 <button class="btn btn-success btn-sm">active</button>
                                 @else
                                 <button class="btn btn-warning btn-sm">>deactive</button>
                                 @endif
                             </td>
                             <td>{{$categories->created_at->format('d-m-y')}}</td>
                             <td>{{$categories->rilationToUser->name}}</td>
                             <td>
                                 <a href="{{route('edit',$categories->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                 <a href="{{route('delete.category',$categories->id)}}"class="btn btn-sm btn-danger">Delete</a>
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