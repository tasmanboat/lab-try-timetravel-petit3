<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['create']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials, $request->has('remember'))){
            session()->flash('success', 'Welcome back!');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', "Sorry, the email and the password don't seem to match.");
            return redirect()->back()->withInput();
        }
    }
    */
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials, $request->has('remember'))){
            session()->flash('success', 'Welcome back!');
            $fallback = route('users.show', [Auth::user()]);
            return redirect()->intended($fallback);
        } else {
            session()->flash('danger', "Sorry, the email and the password don't seem to match.");
            return redirect()->back()->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'Logged out');
        return redirect()->route('users.index');
    }
}
