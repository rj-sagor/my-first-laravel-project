@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <th>sl</th>
                           <th>user name</th>
                           <th>user email</th>
                           <th>action</th>
                       </thead>
                       <tbody>
                           @foreach($data as $data)
                           <tr>
                           <td>{{$loop->index}}</td>
                           <td>{{$data->name}}</td>
                           <td>{{$data->email}}</td>
                           <td>
                               <a href="{{url('/deleteuser',$data->id)}}" class="btn btn-sm btn-danger">Delete</a>
                           </td>
                           </tr>
                       </tbody>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
