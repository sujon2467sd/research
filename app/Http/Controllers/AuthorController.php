<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Author;
use App\Models\AuthorAssign;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.author',[
            'authors'=>Author::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create a new MainCategory instance and save it to the database

       $author = new Author();
       $author->title =$request->title;
       $author->save();

        // Optionally, you may return a response or redirect somewhere
        return redirect()->back()->with('message','Author added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tech_web_authors_assign(){
        return view('admin.author.author_assign',[
            'authors'=>Author::get(),
            'publications'=>Blog::where('status',1)->get(),
            'assigns'=>AuthorAssign::with('author','publication')->latest()->get(),
        ]);
    }

    public function tech_web_authors_assign_store(Request $request){

                // Validate the request
            $request->validate([
                'author' => 'required|string|max:255',
                'publication' => 'required|string|max:255',
            ]);

            // Check if the combination of author and publication already exists
            $existingAssignment = AuthorAssign::where('author_id', $request->author)
                                            ->where('publication_id', $request->publication)
                                            ->first();

            if ($existingAssignment) {
                // If the combination exists, return an error message
                return redirect()->back()->with('exist', 'This combination already exists.');
            }

            // Create a new AuthorAssign instance and save it to the database
            $assign = new AuthorAssign();
            $assign->author_id = $request->author;
            $assign->publication_id = $request->publication;
            $assign->save();

            // Optionally, you may return a response or redirect somewhere
            return redirect()->back()->with('message', 'Assign added successfully');


    }



}
