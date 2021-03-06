<?php

namespace App\Http\Controllers;

use App\Group;
use App\Post;
use App\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostRequestController extends Controller
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
        $postRequests = Auth::user()->postRequests;
        return view('request.post.index', compact('postRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->authorize('student-priv');
        if($post->status == "Closed") {
            return redirect()->back();
            //show some message tht unsuccessful
        }
        $request->validate([
            'detail' => ['required', 'string'],
          ]);

        $info = false;

        if($request->showInfo !== null){
            $info = true;
        }
        $post = PostRequest::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'detail' => $request->detail,
            'status' => 'Pending',
            'info' => $info,
        ]);

        return redirect(route('request.post.index'))->with('message', 'Post request sent!');
        // return to page with all request sent
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostRequest  $postRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PostRequest $postRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostRequest  $postRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PostRequest $postRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostRequest  $postRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostRequest $postRequest)
    {
        $this->authorize('student-priv');
        if($postRequest->post->user_id !== Auth::user()->id && $postRequest->status ==  "Pending"){
            abort(403);
        }
        $post = $postRequest->post;
        if( $request->status == 1) {
            $status = "Accepted";
            if (count($post->postRequests->where('status', 'Accepted')->where('user_id', $postRequest->user_id)) > 0) {
                return redirect()->back()->withErrors('This User has already been accepted.');
                // return message that this guy is already accepted.
            } else if (count($post->postRequests->where('status','=', 'Accepted')) == 0){
                $group = Group::create([
                    "modules" => $post->module->code,
                    'title' => $post->title,
                    'group_type' => 'post',
                    'respective_id' => $post->id
                ]);
                $post->user->assignGroup($group);
                $postRequest->user->assignGroup($group);
            } else {
                $group = Group::where([['group_type', '=', 'post'],['respective_id', '=', $post->id]])->firstOrFail();
                $postRequest->user->assignGroup($group);
            }
        } else {
            $status = "Rejected";
        }
        $postRequest->update([
            'status' => $status
        ]);

        return redirect()->back()->with('message', 'status of request updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostRequest  $postRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostRequest $postRequest)
    {
        //
    }
}
