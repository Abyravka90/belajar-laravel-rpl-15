<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function create()
    {
        return view('private.post.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        // $request->dd();
        // $post = new Post();
        // $post->user_id = auth()->user()->id;
        // $post->category_id = $request->category_id;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->image = 'default-image';
        // $post->description = $request->description;
        // $post->save();
        $this->validate($request, [
            'title' => 'required',
            // 'image' => 'required',
            'description' => 'required'
        ], [
            'title.required' => 'Judul Harus Diisi',
            // 'image.required' => 'Gambar Harus Diisi',
            'description.required' => 'Deskripsi Harus Diisi',
        ]);

        Post::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'slug' => \Str::slug($request->title),
            'image' => 'default-image',
            'description' => $request->description,
        ]);
    }
}
