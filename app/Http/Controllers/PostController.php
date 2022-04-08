<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends MainController
{
    function createpost()
    {
        $this->validate(request(), [
            'title' => 'required',
            'origin' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        $post = Post::create(request(['title', 'origin', 'description', 'author']));

        return redirect()->home();
    }
}
