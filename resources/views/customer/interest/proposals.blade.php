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
                                @foreach($proposals as $proposal)
                                    @if(!empty($proposal))
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
                                            @endif
                                        </td>
                                        <td>
                                            @if($proposal->status == '0')
                                            <a href="{{ route('cancel.request', $proposal->id) }}" class="btn btn-danger btn-sm btn-block">Cancel</a>
                                            @endif
                                        </td>
                                    </tr> 
                                    @endif
                                @endforeach
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