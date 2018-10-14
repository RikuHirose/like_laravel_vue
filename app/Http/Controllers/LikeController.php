<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

class LikeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(Post $post)
    {
        $user = \Auth::user();
        $like = Like::create(['user_id' => $user->id, 'post_id' => $post->id]);

        $likeCount = Like::where('post_id', $post->id)->get();
        $likeCount = count($likeCount);

        return response()->json(['liked' => true, 'likeCount' => $likeCount]);
    }

    public function unlike(Post $post)
    {
        $user = \Auth::user();
        $liked = Like::where('post_id', $post->id)->where('user_id', $user->id)->first();

        $liked->delete();

        $likeCount = Like::where('post_id', $post->id)->get();
        $likeCount = count($likeCount);

        return response()->json(['liked' => false, 'likeCount' => $likeCount]);
    }
}
