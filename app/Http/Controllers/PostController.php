<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Carbon\Carbon;
use App\Notifications\NotComentario;
// use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $posts = Post::paginate(10);
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

    public function show($id) //Id de post
    {
        $resultado = Post::find($id);
        return view('postUnico', ['post' => $resultado]);
    }

    public function show_noti($id) //Id de notificación
    {
        // $notificacion = DB::table('notifications')->where('_id', $id)->first();
        // $notificacion->markAsRead();
        $user = User::find(Auth::id());
        foreach ($user->Notifications as $notification) {
            if($notification->_id == $id){
                $notification->markAsRead();
                $notificacion = $notification;
            }
        }
        $resultado = Post::find($notificacion->data['post_id']);
        return view('postUnico', ['post' => $resultado]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required:max:2200',
        ]);

        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $title = $request->get('title');
        $content = $request->get('content');
        
        $post = $request->user()->posts()->create([
            'title' => $title,
            'image' => 'img/' . $imageName,
            'content' => $content,
        ]);

        $request->image->move(public_path('img'), $imageName);

        return redirect()->route('post', ['id' => $post->id]);
        // return redirect()->route('post', $post->id);

        // $imageName = $request->file('image')->store('posts/' . Auth::id(), 'public');
        // $title = $request->get('title');
        // $content = $request->get('content');

        // $post = $request->user()->posts()->create([
        //     'title' => $title,
        //     'image' => $imageName,
        //     'content' => $content,
        // ]);

        // return redirect()->route('post', ['id' => $post->id]);
    }

    public function today()
    {
        $start = Carbon::now()->startOfDay();
        $end = Carbon::now()->endOfDay();
        $posts = Post::whereBetween('created_at', [$start, $end])->get();
        return view('today', compact('posts'));
    }

    public function userPosts()
    {
        $user_id = Auth::id();
        $publicaciones = Post::where('user_id', '=', $user_id)->get();
        return view('myposts', compact('publicaciones'));
    }

    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $resultado = Post::find($id);
        $resultado->delete();
        return redirect()->route('myposts');
    }
}
