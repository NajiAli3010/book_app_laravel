<?php

namespace App\Http\Controllers;

use App\Models\{book,Author};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
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
            $authors = Author::where('name','LIKE','%'.$searchText.'%')->get();
            return view('authors',['authors'=>$authors]);
        }
    }

    public function index()
    {
        if(isset($_GET['searchText'])){
            $searchText = $_GET['searchText'];
            $authors = Author::where('name','LIKE','%'.$searchText.'%')->get();
            return view('authors',['authors'=>$authors]);
        }else{
            $authors = Author::all();
        }

        $books = book::all();
        return view('authors',compact('authors','books'));

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
        $b1 = new Author;
        $b1->name = $request->author_name;
        $b1->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::find($id);
        return view('updateAuthor',compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $authors=Author::find($id);
        $authors->name = $request->name;
        $authors->save();
        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author,$id)
    {
        $b = Author::find($id);
        $b->delete();
        return redirect()->back();
    }
}
