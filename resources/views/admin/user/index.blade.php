@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Table</h3>
                        <div class="heading-elements">
                        @if(auth()->user()->role == '2')
                            <a href="{{ route('create.user') }}" class="btn btn-success btn-sm mr-4 mt-2 float-right"><i class="icon-plus2"></i>Add User</a>
                        @else
                            <a href="{{ route('manager.create.user') }}" class="btn btn-success btn-sm mr-4 mt-2 float-right"><i class="icon-plus2"></i>Add User</a>
                        @endif
                        </div> 
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>                  
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Height</th>
                                    <th>Weight</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="width: 60px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_no }}</td>
                                    <td>
                                        @if($user->gender == '0')
                                            Male
                                        @elseif($user->gender == '1')
                                            Female
                                        @endif
                                    </td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->height }}</td>
                                    <td>{{ $user->weight }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td><img src="{{ asset('images/'.$user->image) }}" width="50" style="border-radius: inherit;" alt=""></td>
                                    <td>
                                        @if($user->status == '0')
                                            <span class="badge badge-info">Pending</span>
                                        @elseif($user->status == '1')
                                            <span class="badge badge-success">Active</span>
                                        @elseif($user->status == '2')
                                            <span class="badge badge-danger">Block</span>
                                        @elseif($user->status == '3')
                                            <span class="badge badge-warning">Suspend</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(auth()->user()->role == '2')
                                        <a href="{{ route('show.user', $user->id) }}" class="btn btn-success btn-sm btn-block">View</a>
                                        <a href="{{ route('edit.user', $user->id) }}" class="btn btn-info btn-sm btn-block">Edit</a>
                                        <a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger btn-sm btn-block">Delete</a>
                                        @else
                                        <a href="{{ route('manager.show.user', $user->id) }}" class="btn btn-success btn-sm btn-block">View</a>
                                        <a href="{{ route('manager.edit.user', $user->id) }}" class="btn btn-info btn-sm btn-block">Edit</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $users->links() }}
                    </div>
                </div>            
            </div>
        </div>
    </div> 
@endsection