<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    /**
     * Mostra uma notícia especificada
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, string $slug)
    {
        dd($post);
    }
}
