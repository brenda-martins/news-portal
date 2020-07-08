<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Mostra uma notícia especificada
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, string $slug)
    {
        $this->validateVisitor($post);


        return view('site.post', [
            'post' => $post,
            'latestNews' => Post::orderBy('created_at', 'desc')
                ->take(8)
                ->get(),
        ]);
    }


    private function validateVisitor(Post $post)
    {
        if (!Auth::guard('web_administrators')->check() && !Auth::guard('web_authors')->check()) {

            $ip = $_SERVER['REMOTE_ADDR'];
            $dateAtual = date('d/m/Y');

            $visitor = Visitor::where('ip', $ip)
                ->where('post', $post->id)
                ->whereRaw("DATE_FORMAT(date,'%d/%m/%Y') = '{$dateAtual}' ")
                ->first();

            if (!empty($visitor)) {

                $lastVisit = Carbon::createFromFormat('Y-m-d H:i:s', $visitor->date);
                $now = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());

                $difference = $now->diffInHours($lastVisit);

                if ($difference > 24) {
                    $this->insertVisitor($ip, $post->id);
                }
            } else {
                $this->insertVisitor($ip, $post->id);
            }
        }
    }

    private function insertVisitor(string $ip, int $post)
    {
        $visitor = new Visitor();
        $visitor->ip = $ip;
        $visitor->post = $post;

        $visitor->save();
    }
}
