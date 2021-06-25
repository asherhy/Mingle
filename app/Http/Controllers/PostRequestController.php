<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return redirect(route('request.post.index'));
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
        if($postRequest->post->user_id !== Auth::user()->id && $postRequest->status ==  "Pending"){
            abort(403);
        }
        if( $request->status == 1) {
            $status = "Accepted";
        } else {
            $status = "Rejected";
        }
        $postRequest->update([
            'status' => $status
        ]);

        return redirect()->back();
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
