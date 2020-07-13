<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function edit()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('updateuser', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::where('_id', $id)->first();
        $name = $request->get('name');
        $email = $request->get('email');
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return redirect()->route('index');
    }

    public function destroy()
    {
        $id = Auth::id();
        $resultado = User::find($id);
        $resultado->delete();
        return redirect()->route('login');
    }

    public function notifications(){
        $vistas = Auth::user()->readNotifications;
        $novistas = Auth::user()->unreadNotifications;
        return view('notificaciones', compact('vistas','novistas'));
    }
}
