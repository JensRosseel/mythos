<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index()
    {
        $posts = Post::all();
        return view('home', ['posts' => $posts]);
    }

    function register()
    {
        return view('register');
    }

    function login()
    {
        return view('login');
    }

    function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')->get();
        return view('home', ['posts' => $posts]);
    }

    function account()
    {
        if(Auth::check())
        {
            $posts = Post::where('author', Auth::user()->username)->get();
            return view('account', ['posts' => $posts]);
        }
        else
        {
            return redirect()->back();
        }
    }
}
