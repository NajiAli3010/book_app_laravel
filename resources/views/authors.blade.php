@extends('layouts.app')

@section('title')
{{"Authors"}}
@endsection

@section('content')
<div class="container">

<div class="container">
    <form action="authors" method="get">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Author..." aria-label="Search Book" aria-describedby="basic-addon2" name="searchText">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="row justify-content-center">

        <div class="col-4">
            <h1 class="text-center">Add Author</h1>
            <form action="{{ route('authors.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @csrf


                <input type="text" name="author_name" placeholder="Author Name" class="form-control my-2">

                <div class="form-group">
                    <button class="btn btn-success">Update</button>
                </div>


            </form>

        </div>
        <div class="col-8">
            <h1 class="text-center">Authors</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author Title</th>
                        <th scope="col">Books Published</th>
                        <th scope="col">Update / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                    <tr>
                        <th scope="row">{{$author->id}}</th>
                        <th scope="row">{{$author->name}}</th>
                        <th scope="row">{{$books->where('author_id',$author->id)->count()}}</th>
                        <th scope="row">
                            <a href="{{url('/authors/'.$author->id.'/edit')}}" class="btn btn-primary">Edit</a>
                            <a href="/authors/delete/{{$author->id}}" class="btn btn-danger">Delete</a>
                        </th>
                        <th scope="row"></th>

                    </tr>

                    @endforeach

                </tbody>
            </table>


        </div>


    </div>
</div>
<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
@endsection
