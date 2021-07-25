<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller {
    public function search(Request $request) {
        $search = $request->input('search');
        $posts = Post::query()
            ->where('body', 'LIKE', $search)
            ->get();

        $users = User::query()
            ->where('first_name', 'LIKE', $search)
            ->orWhere('last_name', 'LIKE', $search)
            ->get();

        $events = Event::query()
            ->where('name', 'LIKE', $search)
            ->orWhere('description', 'LIKE', $search)
            ->get();


        return view('search_results', compact( 'posts', 'events', 'users'));
    }
}
