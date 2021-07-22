<?php

namespace App\Http\Controllers;

use App\Group;
use App\MentorRequest;
use App\Module;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorRequestController extends Controller
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
    public function mail()
    {
        $requests = Auth::user()->mentorRequestsM;
       foreach ($requests as $request) {
           $request->author = $request->user;
           $request->modules = $request->module;
           $request->acceptRoute = route('mentor.request.accept', $request);
           $request->rejectRoute = route('mentor.request.reject', $request);
       }

        return view('mentor.mail', compact('requests'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentors = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'mentor');
        })->get();
        $modules = Module::all();
        foreach( $mentors as $mentor) {
            $mentor->module = $mentor->modules;
            $mentor->route = route('user.mentor.show', $mentor);
        }

        return view('mentor.index', compact('mentors', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $mentor = $user;
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'modules' => ['required', 'string'],
            'detail' => ['required', 'string'],
          ]);
        $mentorRequest = MentorRequest::create([
            'user_id' => Auth::user()->id,
            'mentor_id' => $mentor->id,
            'title' => $request->title,
            'module_id' => Module::where('code_title', $request->modules)->firstOrFail()->id,
            'status' => 'Pending',
            'detail' => $request->detail
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MentorRequest $mentorRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function showMentees()
    {
        $modules = Module::whereHas('mentorRequests', function($mentorRequest) {
            $mentorRequest->where('status', '!=', 'pending');
        })->get();
        foreach ($modules as $m) {
            $m->mentees = $m->mentorRequests->where('status', 'Accepted')->where('mentor_id', Auth::user()->id);
        }

        return view('mentor.mentees', compact('modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function showRequests()
    {
        $mentor_requests = Auth::user()->mentorRequests;
        $modules = Module::all();
        foreach($mentor_requests as $r) {
            $r->m = $r->mentor;
            $r->moduleCode = $r->module->code;
        }

        return view('mentor.showRequests', compact('mentor_requests', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request, MentorRequest $mentorRequest)
    {
        if($mentorRequest->mentor_id !== Auth::user()->id || $mentorRequest->status != 'Pending'){
            abort(403);
        }

        $mentorRequest->update([
            'status' => 'Accepted'
        ]);
        
        return redirect()->back();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, MentorRequest $mentorRequest)
    {
        if($mentorRequest->mentor_id !== Auth::user()->id || $mentorRequest->status != 'Pending'){
            abort(403);
        }
        $mentorRequest->update([
            'status' => 'Rejected'
        ]);

        return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MentorRequest $mentorRequest)
    {
        //
    }
}
