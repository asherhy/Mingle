<?php

namespace App\Http\Controllers;

use App\Module;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('student-priv');
        $posts = Post::where('status', 'Active')->get();
        foreach ($posts as $post) {
            $post->route = route('post.show', $post);
        }
        return view('post.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myposts()
    {
        $this->authorize('student-priv');
        $posts = Auth::user()->posts;
        foreach ($posts as $post) {
            $post->route = route('post.show', $post);
        }
        return view('post.myposts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('student-priv');
        $modules = Module::all()->pluck('code_title');
        return view('post.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('student-priv');
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'modules' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'type' => ['required', 'string'],

          ]);

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'module_id' => Module::where('code_title', $request->modules)->firstOrFail()->id,
            'status' => 'Active',
            'type' => $request->type,
            'detail' => $request->detail
        ]);

        return redirect(route('post.show', $post));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('student-priv');
        $modules = Module::all()->pluck('code_title');
        $types = ["Active", "Closed"];
        $postRequests = $post->postRequests->where('post_id', $post->id);
        return view('post.show', compact('post', 'modules', 'types', 'postRequests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('student-priv');
        if($post->user_id !== Auth::user()->id){
            abort(403);
        }
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'modules' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'type' => ['required', 'string'],
            'status' => ['required', 'string'],
          ]);

        $post->update([
            'title' => $request->title,
            'module_id' => Module::where('code_title', $request->modules)->firstOrFail()->id,
            'status' => $request->status,
            'type' => $request->type,
            'detail' => $request->detail
        ]);

        return redirect(route('post.show', $post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('student-priv');
        if($post->user_id !== Auth::user()->id){
            abort(403);
        }
        foreach ($post->postRequests as $req) {
            if( $req->status == "Pending") {
                $req->update([
                    "status" => "Deleted"
                ]);
            }
        }
        $post->delete();
        return redirect(route('post.myposts'));
    }
}
