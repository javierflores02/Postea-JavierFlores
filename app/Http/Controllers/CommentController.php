<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\NotComentario;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required:max:250',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->content = $request->get('content');

        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        $coment_user = User::find($comment->user_id);
        $dueño = User::find($post->user_id);
        $dueño->notify(new NotComentario($post->id,$post->title,$coment_user->id,$coment_user->name,$comment->content));

        return redirect()->route('post', ['id' => $request->get('post_id')]);
    }
}
