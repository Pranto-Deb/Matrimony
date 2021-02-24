@extends('layouts.admin.app')
   
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('images/'.$user->image) }}"
                        alt="{{ $user->name }}">
                </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->phone_no }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Age</b> <a class="float-right">{{ $user->age }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Height</b> <a class="float-right">{{ $user->height }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Weight</b> <a class="float-right">{{ $user->weight }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Address</b> <a class="float-right">{{ $user->address }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Current Status</b> 
                        <a class="float-right">
                            @if($user->status == '0')
                                <span class="badge badge-info">Pending</span>
                            @elseif($user->status == '1')
                                <span class="badge badge-success">Active</span>
                            @elseif($user->status == '2')
                                <span class="badge badge-danger">Block</span>
                            @elseif($user->status == '3')
                                <span class="badge badge-warning">Suspend</span>
                            @endif
                        </a>                    
                    </li>
                </ul>
                @if(auth()->user()->role == '2')
                    @if($user->status == '1')
                    <a href="{{ route('update.status', ['id'=>$user->id, 'status'=>'2']) }}" class="btn btn-danger btn-block"><b>Block</b></a>
                    @else
                    <a href="{{ route('update.status', ['id'=>$user->id, 'status'=>'1']) }}" class="btn btn-success btn-block"><b>Active</b></a>
                    @endif
                @else
                    @if($user->status == '1')
                    <a href="{{ route('manager.update.status', ['id'=>$user->id, 'status'=>'2']) }}" class="btn btn-danger btn-block"><b>Block</b></a>
                    @else
                    <a href="{{ route('manager.update.status', ['id'=>$user->id, 'status'=>'1']) }}" class="btn btn-success btn-block"><b>Active</b></a>
                    @endif
                @endif
            </div>
        </div>  
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Table</h3>
            </div>
            <div class="heading-elements">
                <a href="{{ route('create.user') }}" class="btn btn-success btn-sm mr-4 mt-2 float-right"><i class="icon-plus2"></i> Add User</a>
            </div> 
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>                  
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th style="width: 40px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>            
    </div>
</div>
@endsection