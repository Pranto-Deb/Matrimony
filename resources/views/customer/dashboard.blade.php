@extends('layouts.admin.app')
   
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">                    
                    @if(!empty($user) && count($user) > 0) 
                        @foreach($user as $user)
                            <div class="flex-shrink-0 mr-3">
                                <img width="90" src="{{ asset('images/'.$user->image) }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endforeach
                    @endif
                </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{ Auth::user()->phone_no }}</a>
                    </li>
                </ul>
                <a href="{{ route('profile.show') }}" class="btn btn-primary btn-block"><b>View Profile</b></a>
            </div>
        </div>  
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Table</h3>
            </div> 
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>                  
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th style="width: 40px">Status</th>
                            <th style="width: 20px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                    @if(!empty($proposals) && count($proposals) > 0)
                        @foreach($proposals as $proposal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $proposal->sender->name }}</td>
                                <td>{{ $proposal->sender->email }}</td>
                                <td>{{ $proposal->sender->phone_no }}</td>
                                <td>
                                    @if($proposal->status == '0')
                                        <span class="badge badge-info">Pending</span>
                                    @elseif($proposal->status == '1')
                                        <span class="badge badge-success">Accepted</span>
                                    @elseif($proposal->status == '2')
                                    <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    @if($proposal->status == '0')
                                        <a href="{{ route('accept.request', $proposal->id) }}" class="btn btn-success btn-sm btn-block">Accept</a>
                                        <a href="{{ route('reject.request', $proposal->id)}}" class="btn btn-danger btn-sm btn-block">Reject</a>
                                    @endif
                                </td>
                            </tr> 
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $proposals->links() }}
            </div>
        </div>            
    </div>
</div>
@endsection