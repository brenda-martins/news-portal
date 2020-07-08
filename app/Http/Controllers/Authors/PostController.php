<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:web_authors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::leftJoin('visitors', 'posts.id', '=', 'visitors.post')
            ->where('posts.author', Auth::user()->id)
            ->select('posts.*', DB::raw('COUNT(visitors.id) as visitors'))
            ->groupBy('posts.id')
            ->get();




        return view('authors.post.list', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.post.new', [
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

        // dd($request->all());

        $validations = $this->validateForm($request->all());

        if ($validations->fails()) {

            $request->session()->flash('message', 'Alguns campos requerem sua atenção ...');

            return redirect()->back()
                ->withErrors($validations->errors())
                ->withInput($request->all());
        }


        if (!$request->file('file')->isValid()) {
            return redirect()
                ->back()
                ->withErrors("Campo imagens é inválido")
                ->withInput($request->all());
        }

        $file = $request->file('file')->store('images');

        $post = new Post();
        $post->category = $request->category;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $file;
        $post->author = Auth::user()->id;


        if (!$post->save()) {
            return redirect()->back()->withErrors("Não foi possível salvar. Por favor, tente novamente");
        }

        return redirect()->route('author.post.list');
    }


    /**
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Support\Facades\Validator
     */
    private function validateForm($request)
    {
        $rules = [
            'file' => 'required',
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required'
        ];

        $messages = [
            'file.required' => 'O campo imagem é obrigatório',
            'title.required' => 'O campo título é obrigatório',
            'title.string' => 'O campo título não é um valor válido',
            'category.required' => 'O campo categoria é obrigatório',
            'content.required' => 'O campo conteúdo é obrigatório',
            'content.string' => 'O campo conteúdo não é um valor válido',
        ];

        return Validator::make($request, $rules, $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("authors.post.edit", [
            'post' => $post,
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        // dd($request->all());

        $fields = $request->only(['title', 'content', 'category']);
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ];
        $messages = [
            'title.required' => 'O campo título é obrigatório',
            'category.required' => 'O campo categoria é obrigatório',
            'content.required' => 'O campo conteúdo é obrigatório'
        ];


        $validations = Validator::make($fields, $rules, $messages);

        if ($validations->fails()) {

            $request->session()->flash('message', 'Alguns campos requerem sua atenção ...');

            return redirect()->back()
                ->withErrors($validations->errors())
                ->withInput($request->all());
        }


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
        $post->author = Auth::user()->id;

        $post->save();

        $request->session()->flash('message', 'Postagem atualizada com sucesso');
        return redirect()->route('author.post.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
