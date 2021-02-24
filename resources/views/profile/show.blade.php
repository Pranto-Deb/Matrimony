@extends('layouts.admin.app')
   
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @livewire('profile.update-profile-information-form')
        </div>

        <div class="col-md-12">
            @livewire('profile.update-password-form')
        </div>
    </div>
</div>
@endsection
