<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    public function index()
    {
//        return Post::all();
//        $posts = Post::orderBy('title', 'desc')->get();
//        $posts = Post::orderBy('title', 'desc')->take(1)->get();
        $posts = Post::orderBy('title', 'desc')->paginate(2);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'body' => 'required',
            'cover_img' => 'required | mimes:jpg,png',
            'book_loc' => 'required|file'
        ]);
        // Handle Uplaod
        if ($request->hasFile('cover_img')){
            //Get filename with extension
            $filenamewithext = $request->file('cover_img')->getClientOriginalName();
            $booknamewithext = $request->file('book_loc')->getClientOriginalName();
            //Get file name
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $bookname = pathinfo($booknamewithext, PATHINFO_FILENAME);
            //Get Ext
            $ext = $request->file('cover_img')->getClientOriginalExtension();
            $extbook = $request->file('book_loc')->getClientOriginalExtension();
            //File name to store
            $filenametostore = $filename.'_'.time().'.'.$ext;
            $booknametostore = $bookname.'_'.time().'.'.$extbook;
            //Upload the file
            $path = $request->file('cover_img')->storeAs('public/cover_images',$filenametostore);
            $bookpath = $request->file('book_loc')->storeAs('public/books', $booknametostore);

        }
        if($request->hasFile('book_loc')){
            $booknamewithext = $request->file('book_loc')->getClientOriginalName();
            $bookname = pathinfo($booknamewithext, PATHINFO_FILENAME);
            $extbook = $request->file('book_loc')->getClientOriginalExtension();
            $booknametostore = $bookname.'_'.time().'.'.$extbook;
            $bookpath = $request->file('book_loc')->storeAs('public/books', $booknametostore);
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_img = $filenametostore;
        $post->book_loc = $booknametostore;
        $post->author = $request->input('author');
        $post->save();

        return redirect('/posts')->with('success', 'Book Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return Post::find($id);
        $post =  Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // check for correct user
        if (auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Access Denied');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'body' => 'required'
        ]);

         // Handle Uplaod
         if ($request->hasFile('cover_img')){
            //Get filename with extension
            $filenamewithext = $request->file('cover_img')->getClientOriginalName();
            $booknamewithext = $request->file('book_loc')->getClientOriginalName();
            //Get file name
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $bookname = pathinfo($booknamewithext, PATHINFO_FILENAME);
            //Get Ext
            $ext = $request->file('cover_img')->getClientOriginalExtension();
            $extbook = $request->file('book_loc')->getClientOriginalExtension();
            //File name to store
            $filenametostore = $filename.'_'.time().'.'.$ext;
            $booknametostore = $bookname.'_'.time().'.'.$extbook;
            //Upload the file
            $path = $request->file('cover_img')->storeAs('public/cover_images',$filenametostore);
            $bookpath = $request->file('book_loc')->storeAs('public/books', $booknametostore);

        }
        if($request->hasFile('book_loc')){
            $booknamewithext = $request->file('book_loc')->getClientOriginalName();
            $bookname = pathinfo($booknamewithext, PATHINFO_FILENAME);
            $extbook = $request->file('book_loc')->getClientOriginalExtension();
            $booknametostore = $bookname.'_'.time().'.'.$extbook;
            $bookpath = $request->file('book_loc')->storeAs('public/books', $booknametostore);
        }

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_img')) {
            $post->cover_img = $filenametostore;
        }
        if ($request->hasFile('book_loc')){
            $post->book_loc = $booknametostore;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Book Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // check for correct user
        if (auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Access Denied');
        }
        Storage::delete('public/cover_images/'.$post->cover_img);
        Storage::delete('public/books/'.$post->book_loc);
        $post->delete();
        return redirect('/posts')->with('success', 'Book Data Deleted');
    }

    // 
}
