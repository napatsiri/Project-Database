<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function getCommentsByPost($id)
    { 
        $post= Post::find($id); 
        $comments= Post::find($id)->comments;
        
        
        return view('comments', compact('comments', 'post')); 
    }
}
