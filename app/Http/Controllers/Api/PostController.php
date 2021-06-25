<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Archive index
     */

    public function index(){

        //$posts= Post::all();

        $posts = Post::paginate(10);

        return response()->json($posts);

    }
}
