<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(7);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::orderBy('name', 'ASC')->get();

        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('admin.post.create', compact('categories','tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        $post = new Post();

        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->status = $request->status;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->save();
        // $post = Post::create($request->all());

        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }

        $post->tags()->attach($request->get('tags'));

        return back()->with('agregar', 'Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $data = Post::select('posts.id as id_posts, posts.name as name_posts, posts.excerpt as excerpt_posts,
        // posts.slug as slug_posts, posts.body as body_posts, posts.status as status_posts, posts.user_id as user_id_posts, posts.category_id as category_id_posts')
        // ->join('categories', 'posts.category_id', '=', 'categories.id' )
        // ->join('users', 'posts.user_id', '=', 'users.id')
        // ->where('posts.id', $id)->get();

        // return view('admin.post.edit', compact('data'));

        $categories = Category::orderBy('name', 'ASC')->get();

        $tags       = Tag::all();
        
        $post       = Post::find($id);
        
        return view('admin.post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->status = $request->status;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->save();
        // $post->fill($request->all())->save();

        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }

        $post->tags()->sync($request->get('tags'));

        return back()->with('editar', 'Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return back()->with('delete', 'Eliminado Correctamente');
    }
}
