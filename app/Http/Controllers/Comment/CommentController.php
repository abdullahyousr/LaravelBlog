<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;    
use App\Models\Comment;    

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);
        $comment = $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);
        
        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Comment added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {        
        $post = $comment->post;
        $comment->delete();
        
        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Comment deleted successfully!');
    }
}
