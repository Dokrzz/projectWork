<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function getDashboard() {
        $posts = Post::all();
        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request) {
        // Validation

        $this->validate($request, [
            'body' => 'required|max:240',
            'network' => 'required'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        $post->network = $request['network'];
        if ($request->user()->posts()->save($post)) {
            $message = "Post successfully created!";
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }
}
