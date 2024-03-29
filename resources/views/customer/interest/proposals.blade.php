@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                            @if(!empty($proposals) && count($proposals) > 0)
                                @foreach($proposals as $proposal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $proposal->receiver->name }}</td>
                                        <td>{{ $proposal->receiver->email }}</td>
                                        <td>{{ $proposal->receiver->phone_no }}</td>
                                        <td>
                                            @if($proposal->status == '0')
                                                <span class="badge badge-info">Pending</span>
                                            @elseif($proposal->status == '1')
                                                <span class="badge badge-success">Accepted</span>
                                            @else($proposal->status == '2')
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($proposal->status == 0)
                                                <a href="{{ route('cancel.proposal', $proposal->id) }}" class="btn btn-danger btn-sm btn-block">Cancel</a>
                                            @elseif($proposal->status == '1')
                                                <a href="{{ route('cancel.proposal', $proposal->id) }}" class="btn btn-danger btn-sm btn-block">Cancel</a>
                                            @else($proposal->status == '2')
                                                <a href="{{ route('send.proposal', $proposal->receiver->id) }}" class="btn btn-success btn-sm btn-block"><b>Send</b></a>
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
    </div> 
@endsection