@extends('layouts.app')

@section('content')



    <div class="row justify-content-center">
        @foreach ($books as $book)

            <div class="item">
                <div class="card mx-3 my-3 book_card" style="width: 13rem;">
                    <img class="card-img-top" src="{{asset('images/'.$book->book_image)}}" alt="Card image cap"
                        width="100px" height="250px">
                    <div class="card-body">
                        <h5 class="card-title"><strong><a href="#">{{$book->book_name}}</a></strong></h5>
                        <p class="card-text">{{$book->book_auther}}</p>
                        <h2 class="card-text">{{"$".$book->book_price}}</h2>
                    </div>
                </div>

            </div>

        @endforeach


    </div>

</div>
</div>
@endsection
