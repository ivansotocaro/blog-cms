<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PageController extends Controller
{

    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web/posts', compact('posts'));
    }


    public function categoria($slug)
    {
        $idcategory = Category::where('slug', $slug)->pluck('id')->first();
        $posts    = Post::where('category_id', $idcategory)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
       
        return view('web/posts', compact('posts'));
    }


    public function etiqueta($slug)
    {

        $posts    = Post::whereHas('tags', function($query) use ($slug){
            $query->where('slug', $slug);
        })->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
       
        return view('web/posts', compact('posts'));
    }



    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $users = User::all();

        // foreach($user as $i => $users){
        //         $user[$i] = $users;
        // }
        
        foreach($post->comments as $i => $comment){
            $comments[$i] = $comment;
        }

        

        return view('web.post', compact('post', 'comments', 'users'));
    }

   

   
}
