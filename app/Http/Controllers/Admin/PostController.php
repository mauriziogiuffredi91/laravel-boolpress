<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        $categories = Category::all();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();



        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione
        $request -> validate([
            'title'=>'required| unique:posts| max:26',
            'content'=>'required | max:500',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'nullable|exists:tags,id',
        ], [
            'required'=>'The :attribute is required',
            'unique'=> 'The :attribute is already taken',
            'max'=> 'You reached the limit of :max characters '

        ]);

        $data = $request->all();
        //dd($data);

        //generazione dello slug 
        $data['slug'] = Str::slug($data['title'], '-');


        //creazione e salvataggio del record
        $new_post = new Post();
        $new_post->fill($data); //fillable

        $new_post->save();

        //Salva relation with tags in the Pivot table
        if (array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $new_post->id);

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
        
        if (! $post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        $tags = Tag::all();

        if (! $post) {
            abort(404);
        }
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        //valide
        $request -> validate([
            'title'=>[
                'required',
                Rule::unique('posts')->ignore($id),
                'max: 255',
            ],
            'content'=>'required | max:500',
            'category_id'=>'nullable| exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
        ], [
            'required'=>'The :attribute is required',
            'unique'=> 'The :attribute is already taken',
            'max'=> 'You reached the limit of :max characters '

        ]);
        
        


        $data = $request->all();

        $post = Post::find($id);

        //gen slug
        if ($data['title'] != $post->title) {
            $data['slug'] = Str::slug($data['title'], '-');
            
        }
        $post->update($data); //fillable

        //Aggiorna relation tabel pivot
        if (array_key_exists('tags', $data)) {
            //aggiungere records
            $post->tags()->sync($data['tags']);
        } else{
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //tab pivot
        $post->tags()->detach();


        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
