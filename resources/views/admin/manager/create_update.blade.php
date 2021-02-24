@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Manager</h3>
                </div>
                @if(!empty($manager))
                <form role="form" action="{{ route('update.manager', $manager->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                @else
                <form role="form" action="{{ route('store.manager') }}" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{ !empty($manager)? $manager->name : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ !empty($manager)? $manager->email : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone No</label>
                                    <input type="number" name="phone_no" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" value="{{ !empty($manager)? $manager->phone_no : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="exampleInputFile">Status<span class="text-danger"></span></label>
                                    <select name="status" class="form-control">
                                        <option value="0" {{ !empty($manager) && $manager->status == '0' ? 'selected' : '' }}>Pending</option>
                                        <option value="1"  {{ !empty($manager) && $manager->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="2"  {{ !empty($manager) && $manager->status == '2' ? 'selected' : '' }}>Block</option>
                                        <option value="3"  {{ !empty($manager) && $manager->status == '3' ? 'selected' : '' }}>Suspend</option>
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