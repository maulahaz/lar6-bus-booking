<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
	public function __construct()
    {
        $this->data['title'] = 'My Laravel Apps';
    }

    public function index()
    {
        // dd('Post - Index');
        $this->data['pageTitle'] = "Post - Index";
        return view('posts.index', $this->data);
        // return view('templates.stisla.v_adminpage');
    }

    public function now()
    {
        dd('Post - Index');
        $userID = 2366;
        $this->data['userID'] = $userID;
        $this->data['pageTitle'] = "Post - Now";
        return view('posts.v_post', $this->data);
    }

    public function store(Request $request)
    {
        dd('Post - store');
        $this->validate($request, [
            'post_title' => 'required',
            'post_content' => 'required'
        ]);
        
        Post::create([
            'user_id' => $request->user_id,
            'title' => $request->post_title,
            'body' => $request->post_content
        ]);
        dd('test');
        return back();
    }
}
