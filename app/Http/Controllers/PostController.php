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
            'tags' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create(request(['title', 'tags', 'description', 'author']));

        return redirect()->home();
    }
}
