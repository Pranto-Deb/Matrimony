@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manager Table</h3>
                        <div class="heading-elements">
                            <a href="{{ route('create.manager') }}" class="btn btn-success btn-sm mr-4 mt-2 float-right"><i class="icon-plus2"></i> Add Manager</a>
                        </div>
                    </div> 
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>                  
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Phone No</th>
                                    <th>Status</th>
                                    <th style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $manager->name }}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>{{ $manager->phone_no }}</td>
                                    <td>
                                        @if($manager->status == '0')
                                        <span class="badge badge-success">Pending</span>
                                        @elseif($manager->status == '1')
                                        <span class="badge badge-success">Active</span>
                                        @elseif($manager->status == '2')
                                        <span class="badge badge-danger">Block</span>
                                        @elseif($manager->status == '3')
                                        <span class="badge badge-warning">Suspend</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('edit.manager', $manager->id) }}" class="btn btn-info btn-sm btn-block">Edit</a>
                                        <a href="{{ route('delete.manager', $manager->id) }}" class="btn btn-danger btn-sm btn-block">Delete</a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $managers->links() }}
                    </div>
                </div>            
          </div>
        </div>
    </div> 
@endsection