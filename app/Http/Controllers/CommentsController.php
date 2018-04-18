<?php

namespace App\Http\Controllers;

use App\System\Models\Post;
use App\System\Models\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $post->addComment(request('body'));
        
        return back();
    }
}
