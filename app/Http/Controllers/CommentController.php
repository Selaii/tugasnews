<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate(['body' => 'required|string|max:255']);

        $news->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(), // Save the current user ID
        ]);

        return redirect()->route('news.show', $news); // Redirect back to the news article
    }


    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate(['body' => 'required|string|max:255']);

        $comment->update(['body' => $request->body]);

        return redirect()->route('news.show', $comment->news_id)->with('success', 'Comment updated successfully.');
    }


    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return back()->with('status', 'Comment deleted successfully!');
    }
}
