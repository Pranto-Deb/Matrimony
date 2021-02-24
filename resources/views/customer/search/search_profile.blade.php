@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if(!empty($users))
            @foreach($users as $user)
                <div class="col-md-4">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{ $user->name }}</h3>
                            <h5 class="widget-user-desc">{{ $user->phone_no }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{ asset('images/'.$user->image) }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->age }}</h5>
                                        <span class="description-text">Age</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->height }}</h5>
                                        <span class="description-text">Height</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->weight }}</h5>
                                        <span class="description-text">Weight</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('send.proposal', $user->id) }}" class="btn btn-success btn-block"><b>Send Proposal</b></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div> 
@endsection