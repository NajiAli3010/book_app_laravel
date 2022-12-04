@extends('layouts.app')

@section('title')
{{"Books"}}
@endsection

@section('content')
<div class="container">

<div class="container">
    <form action="books" method="get">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Book..." aria-label="Search Book" aria-describedby="basic-addon2" name="searchText">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="row justify-content-center">

        <div class="col-4">
            <h1 class="text-center">Add Book</h1>
            <form action="books" method="POST" enctype="multipart/form-data">
                @csrf
                <p><input type="file" accept="image/*" name="book_image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                <p>
                    <label for="file" style="cursor: pointer;" class="btn btn-success">Upload Image</label>
                </p>
                <p class="align-item-center"><img id="output" width="200" /></p>


                <input type="text" name="book_title" placeholder="Book Title" class="form-control my-2">
                <input type="text" name="book_price" placeholder="Book Price" class="form-control my-2">
                <input type="text" name="book_author" placeholder="Book Author" class="form-control my-2">
                <select class="form-control my-2" name="author_id" require>
                    <option disabled selected>Select Author</option>
                    @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach

                </select>

                <div class="form-group">
                    <button class="btn btn-success">Update</button>
                </div>


            </form>

        </div>
        <div class="col-8">
            <h1 class="text-center">Books</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book Price</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Update / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{$book->bid}}</th>
                        <th scope="row">{{$book->book_name}}</th>
                        <th scope="row">{{$book->book_price}}</th>
                        <th scope="row">{{$book->author->name}}</th>
                        <th scope="row">
                            <a href="/books/edit/{{$book->bid}}" class="btn btn-primary">Edit</a>
                            <a href="/books/delete/{{$book->bid}}" class="btn btn-danger">Delete</a>
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
