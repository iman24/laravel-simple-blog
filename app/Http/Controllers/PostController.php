<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{

    function __construct()
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
        $p = Post::orderBy('id', 'DESC')->paginate(5);
        return view('post.index', ['data' => $p]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', ['category' => Category::orderBy('name', 'ASC')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {


        $post = new Post;
        $post->fill($request->all());
        $post->slug = \Illuminate\Support\Str::kebab(str_replace(['-','.'], '', $request->validated()['title']));
        $post->save();


        return redirect(url('/'))->with('message', 'Post berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('main');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('post.edit', ['post' => Post::find($id),'category' => Category::orderBy('name', 'ASC')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,$id)
    {

        Post::where('id', intval($id))
            ->update(
                array_merge($request->validated(),
                array(
                    'slug' =>
        \Illuminate\Support\Str::kebab(str_replace(['-','.'], '', $request->validated()['title']))
        )));



        return redirect(url('/post'))->with('message', 'Post berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
         return redirect(url('/post'))->with('message', 'Post berhasil di hapus');


    }
}
