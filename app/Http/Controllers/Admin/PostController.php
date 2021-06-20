<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Post;

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

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.posts.create');
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
        ], [
            'required'=>'The :attribute is required',
            'unique'=> 'The :attribute is already taken',
            'max'=> 'You reached the limit of :max characters '

        ]);

        $data = $request->all();

        //generazione dello slug 
        $data['slug'] = Str::slug($data['title'], '-');


        //creazione e salvataggio del record
        $new_post = new Post();
        $new_post->fill($data); //fillable

        $new_post->save();

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

        if (! $post) {
            abort(404);
        }
        return view('admin.posts.edit', compact('post'));
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
            # code...
        }
        $post->update($data); //fillable

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
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
