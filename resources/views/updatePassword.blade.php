@extends('layouts.app')

@section('title') 
    {{"Update Password"}}
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4"></div>
        <div class="col-4">
            <h1 class="text-center">Update Password</h1>

            <form action="/profile/update/{{$profile[0]->id}}" method="POST">
                @csrf
                <input type="text" name="password" placeholder="Enter your new password" class="form-control my-2" value="">

                <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>

        </div>
        <div class="col-4"></div>


    </div>
</div>
@endsection
