<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
        if(Auth::check())
        {
            redirect()->account();
        }
        else
        {
            return view('login');
        }
    }
}
