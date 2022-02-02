<?php

namespace App\Http\Controllers\Admin;
//namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
                        ->paginate(5);
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
        $request->validate($this->makeValid(), $this->makeMessage());

        $data = $request->all();
        
        $new_post = new Post();
        // $new_post->title = $data['title'];
        // $new_post->content = $data['content'];
        $new_post->fill($data);

        $new_post->slug = $this->makeSlug($new_post->title);
        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post);
        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post){
            return view('admin.posts.show', compact('post'));
        }
        abort(404, 'Questa pagina non esiste');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
    }

    private function makeSlug($str){
        return Str::slug($str);
    }

    private function makeValid(){
        return [    
            "title"=>"required|max:50|min:2",
            "content"=>"required|max:500|min:2"
        ];
    }

    private function makeMessage(){
        return [    
            "title.required"=>"Il titolo è obbligatorio",
            "title.min"=>"Devi inseirire minimo 2 caratteri",
            "title.max"=>"Puoi inseirire massimo 50 caratteri",
            "content.max"=>"Puoi inseirire massimo 500 caratteri",
            "content.min"=>"Devi inseirire minimo 2 caratteri",
            "content.required"=>"Questo campo è obbligatorio",
        ];
    }
}

