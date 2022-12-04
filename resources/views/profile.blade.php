@extends('layouts.app')

@section('content')
<div class="container profile-container">
    <div class="row">
        <div class="col-4 left-column px-4 py-5">
            <h4 class="text-center">PROFILE</h4>

            <div class="d-flex align-items-center justify-content-between py-3">
                <label for="name" class="pr-4">Name</label>
                <input type="text" class="form-control" value="{{$emails[0]->name}}">
            </div>
            
            <div class="d-flex align-items-center justify-content-between py-3">
                <label for="name" class="pr-4">Email</label>
                <input type="text" class="form-control" value="{{$emails[0]->email}}">
            </div>
            <div class="text-right py-3">
                <a href="/profile/edit/{{$emails[0]->id}}" class="btn btn-primary">Change Password</a>
            </div>

        </div>
        <div class="col-8"></div>
    </div>
</div>
@endsection
