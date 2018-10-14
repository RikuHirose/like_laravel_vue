<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();

        $post          = new Post;
        $post->content = $request->content;
        $post->user_id = $user->id;

        $post->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user      = \Auth::user();
        $post      = Post::find($id);
        $post->load('likes');

        if(isset($post->likes)) {
            $liked     = false;
            $likeCount = 0;

        } else {
            $liked = true;
            $likeCount = count($post->likes);
        }


        return view('post.show', ['post' => $post, 'liked' => $liked, 'likeCount' => $likeCount]);
    }

}
