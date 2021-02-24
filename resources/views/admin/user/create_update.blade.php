@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                </div>
                @if(!empty($user))
                    @if(auth()->user()->role == '2')
                        <form role="form" action="{{ route('update.user', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form role="form" action="{{ route('manager.update.user', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @endif
                @else
                    @if(auth()->user()->role == '2')
                        <form role="form" action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
                    @else
                        <form role="form" action="{{ route('manager.store.user') }}" method="POST" enctype="multipart/form-data">
                    @endif
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{ !empty($user)? $user->name : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ !empty($user)? $user->email : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone No</label>
                                    <input type="number" name="phone_no" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" value="{{ !empty($user)? $user->phone_no : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="exampleInputFile">Gender<span class="text-danger"></span></label>
                                    <select name="gender" class="form-control">
                                        <option>Gender</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Age</label>
                                    <input type="number" name="age" class="form-control" id="exampleInputEmail1" placeholder="Enter age" value="{{ !empty($user)? $user->age : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Height</label>
                                    <input type="number" name="height" class="form-control" id="exampleInputEmail1" placeholder="Enter height" value="{{ !empty($user)? $user->height : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weight</label>
                                    <input type="number" name="weight" class="form-control" id="exampleInputEmail1" placeholder="Enter weight" value="{{ !empty($user)? $user->weight : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter address" rows="3" cols="3">{{ !empty($user)? $user->address : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                                    @if(!empty($user)) 
                                    <div class="col-sm-12">
                                        <img src="{{ asset('images/'.$user->image) }}" width="90" style="border-radius: inherit;" alt="" class="mb-1 mr-1">
                                    </div>
                                    @endif
                                    <div class="col-sm-12">
                                        <input type="file" name="image">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="exampleInputFile">Status<span class="text-danger"></span></label>
                                    <select name="status" class="form-control">
                                        <option value="0" {{ !empty($user) && $user->status == '0' ? 'selected' : '' }}>Pending</option>
                                        <option value="1"  {{ !empty($user) && $user->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="2"  {{ !empty($user) && $user->status == '2' ? 'selected' : '' }}>Block</option>
                                        <option value="3"  {{ !empty($user) && $user->status == '3' ? 'selected' : '' }}>Suspend</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection