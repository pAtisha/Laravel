<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function newComment(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:3',
        ]);
        $comment = new Comment;
        $comment->post_id = $request->get('post_id');
        $comment->content = $request->get('content');
        $comment->post_type = $request->get('post_type');

        $comment->save();

        return redirect()->back()->with('status','Your comment has been created!');
    }
}
