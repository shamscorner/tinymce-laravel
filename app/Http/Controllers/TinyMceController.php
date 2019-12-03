<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class TinyMceController extends Controller
{
    /**
    * Author: shamscorner
    * DateTime: 03/December/2019 - 21:44:20
    *
    * main entry point
    *
    */
    public function index()
    {
        return view('welcome');
    }

    /**
    * Author: shamscorner
    * DateTime: 03/December/2019 - 23:15:35
    *
    * show the post
    *
    */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('show', compact('post'));
    }

    /**
    * Author: shamscorner
    * DateTime: 03/December/2019 - 22:25:58
    *
    * store the post in the database
    *
    */
    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required'
        ]);

        $data = $request->except('_token');

        $post = Post::create($data);

        return redirect()->route('post.show', $post->id);
    }

    /**
    * Author: shamscorner
    * DateTime: 03/December/2019 - 22:23:33
    *
    * edit the post using TinyMce editor
    *
    */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('edit', compact('post'));
    }

    /**
    * Author: shamscorner
    * DateTime: 03/December/2019 - 22:27:27
    *
    * update the post data in the database
    *
    */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');

        Post::where('id', $id)->update($data);

        return redirect()->route('post.show', $id);
    }

    /**
    * Author: shamscorner
    * DateTime: 03/December/2019 - 22:42:53
    *
    * upload the post images from tinyMCE
    *
    */
    public function uploadImage(Request $request)
    {
        $imgpath = $request->file('file')->store('post', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
