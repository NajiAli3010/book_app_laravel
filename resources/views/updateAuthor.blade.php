@extends('layouts.app')

@section('title') 
    {{"Update Author"}}
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-4"></div>
        <div class="col-4">
            <h1 class="text-center">Update Author</h1>
            <form action="{{route('authors.update',$authors->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <input type="text" name="name" placeholder="Author Title" class="form-control my-2" value="{{$authors->name}}">

                <div class="form-group">
                    <button class="btn btn-success">Update</button>
                </div>


            </form>

        </div>
        <div class="col-4"></div>


    </div>
</div>
@endsection
