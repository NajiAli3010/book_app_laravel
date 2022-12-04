<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{book,Author};
use Illuminate\Support\Facades\DB;


class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   
        if(isset($_GET['searchText'])){
            $searchText = $_GET['searchText'];
            // $books = DB::table('books')->where('book_name','LIKE','%'.$searchText.'%');
            $books = book::where('book_name','LIKE','%'.$searchText.'%');
            $authors = Author::all();
            return view('home',compact('books','authors'));
        }
    }

    public function index()
    {
        if(isset($_GET['searchText'])){
            $searchText = $_GET['searchText'];
            $books = book::where('book_name','LIKE','%'.$searchText.'%')->get();
            $authors = Author::all();
            return view('books',compact('books','authors'));
        }else{
            $books = book::all();
        }
        
        $authors = Author::all();
        return view('books',compact('books','authors'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b1 = new book;
        $b1->book_name = $request->book_title;
        $b1->book_price = $request->book_price;
        $b1->author_id = $request->author_id;
        if($request->hasfile('book_image')){
            $file = $request->file('book_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('images/',$filename);
            $b1->book_image = $filename;
        }

        $b1->save();
        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $books = book::all();
        // return view('books',['books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = book::find($id);
        $authors = Author::all();
        return view('updateBook',compact('books','authors'));
        // return view('updateBook',['books'=>$books]);

        // $books = book::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $books=book::find($id);
        $books->bid = $request->book_id;
        $books->book_name = $request->book_title;
        $books->book_price = $request->book_price;
        $books->author_id = $request->author_id;
        $books->save();
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = book::find($id);
        $b->delete();
        return redirect('books');
    }


    
}
