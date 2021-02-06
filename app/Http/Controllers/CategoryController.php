<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

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
        $p = Category::orderBy('id', 'DESC')->paginate(5);
        return view('category.index', ['data' => $p]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $category = new Category;
        $category->name = $validate['name'];
        $category->slug = \Illuminate\Support\Str::kebab($validate['name']);
        $category->save();

        return redirect('/category')->with('message', 'Berhasil menambahkan category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('category.show', ['posts' => Category::find($id)->post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $this->authorize('create', Category::class);
        return view('category.edit', ['category' => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->authorize('create', Category::class);
         $validate = $request->validate([
         'name' => 'required'
         ]);

         $category = Category::find($id);
         $category->name = $validate['name'];
         $category->slug = \Illuminate\Support\Str::kebab($validate['name']);
         $category->save();

         return redirect('/category')->with('message', 'Berhasil diubah category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('create', Category::class);
        Category::destroy($id);
        return redirect(url('/category'))->with('message', 'Category berhasil di hapus');
    }
}
