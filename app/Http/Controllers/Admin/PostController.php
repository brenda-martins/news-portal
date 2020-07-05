<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.post.list', [
            'posts' => Post::with('category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.new', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = filter_var_array($request->all(), FILTER_SANITIZE_STRING);

        // if (in_array("", $data)) {
        //     return redirect()->back()->withErrors("Favor preencher todos os campos");
        // }


        if (!$request->file('file')->isValid()) {
            return redirect()->back()->withErrors("Tipo de arquivo inválido");
        }

        $file = $request->file('file')->store('images');

        $post = new Post();
        $post->category = $data["category"];
        $post->title = $data["title"];
        $post->content = $data["content"];
        $post->image = $file;

        if (!empty($data["author"])) {
            $post->author = $data["author"];
        } else {
            $post->author = Auth::user()->name;
        }


        if (!$post->save()) {
            return redirect()->back()->withErrors("Não foi possível salvar. Por favor, tente novamente");
        }

        return redirect('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view("admin.post.edit", [
            'post' => $post,
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());

        if (!$request->spotlight) {
            $post->spotlight = 0;
        } else {
            $post->spotlight = 1;
        }


        if ($request->file('file')) {

            Storage::delete($post->image);
            $post->image = $request->file('file')->store('images');
        }

        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->author = $request->author;

        $post->save();

        $request->session()->flash('status', 'Task was successful!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return dd($post);
    }
}
