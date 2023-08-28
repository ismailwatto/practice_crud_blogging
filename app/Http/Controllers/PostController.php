<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Traits\Image;
use Illuminate\Http\Request;
use App\Events\UserLoggedOut;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use Image;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo Auth::id();
        // Check if the user is an admin
        $isAdmin = Auth::check() && Auth::user()->role === 'admin';

        // Get posts based on the user's role
        if ($isAdmin) {
            $post = Post::all(); // Get all posts for the admin
        } else {
            $user_id = Auth::id();
            $post = Post::where('user_id', $user_id)->get(); // Get posts of the authenticated user
        }
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth()->check()) {
            return redirect()->route('login')->with('error', 'please login first.');
        }
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'views' => 'required|integer',
        ]);

        // ...
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->views = $request->views;
        if ($request->hasFile('image')) {
            $post->image = $this->imageStore($request->file('image'));
        }
        $post->user_id = Auth::user()->id;
        $post->save();
        // Attach the selected category to the post
        // $post->categories()->attach($request->category_id);

        return response()->json(['res' => 'Post created successfully']);
        // ...

    }

    /**
     * Display the specified resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'You have been logged out.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.update', compact('post'));
    }
    /**
     * Update the specified resource in storag.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'views' => 'required|integer',
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->views = $request->views;
        if ($request->hasFile('image')) {
            if ($post->image) {
                imageDelete($post->image);
            }
            $post->image = $this->imageStore($request->file('image'));
        }
        $post->save();

        // Update the categories for the post using sync
        return redirect()->route('posts.read')->with('success', 'Post data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post or an admin
        if (Auth::id() === $post->user_id || Auth::user()->isAdmin()) {
            $post->delete();
            return redirect()->back()->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this post.');
        }
    }
}
