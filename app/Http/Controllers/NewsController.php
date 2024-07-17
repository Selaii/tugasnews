<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->with('comments')->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        // Create a new news instance
        $news = new News();
        $news->headline = $request->headline;
        $news->image = $request->file('image')->store('images', 'public'); // Save image path
        $news->text = $request->text;
        $news->user_id = auth()->id(); // Set the authenticated user's ID
        $news->save(); // Save the news to the database

        // Redirect to the home route with a success message
        return redirect()->route('home')->with('status', 'News created successfully!');
    }




    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function comment(Request $request, News $news)
    {
        $request->validate(['body' => 'required|string|max:255']);

        $news->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('news.show', $news);
    }

    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('status', 'Comment deleted successfully!');
    }
    
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'text' => 'required|string',
        ]);

        $news->headline = $request->headline;

        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('images', 'public');
        }

        $news->text = $request->text;
        $news->save();

        return redirect()->route('home')->with('status', 'News updated successfully!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('home')->with('status', 'News deleted successfully!');
    }

    
    
    

}
