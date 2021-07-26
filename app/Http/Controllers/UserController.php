<?php

namespace App\Http\Controllers;

use App\Major;
use App\Module;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $modules = Module::all();
        if(!isset($modules)) {
          $modules = [];
        }
        $majors = Major::all();
        if(!isset($majors)) {
          $majors = [];
        }
        //dd($majors);
        if(Auth::user()->isStudent()){
          return view('user.show', compact('majors', 'modules'));
        } else if (Auth::user()->isMentor()){
          return view('mentor.profile', compact('majors', 'modules'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('auth.change_pass');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $request->validate([
        'oldPassword' => ['required', new MatchOldPassword],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();
        
        return redirect()->back()->with('message', 'Password successfully changed!');
    

    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
          'majors' => ['required', 'array', 'max:3'],
          'modules' => ['required', 'array', 'max:8'],
          'matric' => ['required'],
          'gender' => ['required'],
          'name' => ['required'],
          'telegram' => ['required'],
        ]);

        $user->update([
          'name' => $request->name,
          'telegram' => $request->telegram,
          'gender' => $request->gender,
          'matric_year' => $request->matric,
          'detail' => $request->intro,
          'status' => ($request->status == 1 ? 'Available' : 'Unavailable'),
          'position' => $request->position
        ]);
        
        $user->majors()->detach();
        $user->modules()->detach();
        foreach($request->majors as $major) {
          $user->assignMajor($major);
        }
        foreach($request->modules as $module) {
          $user->assignModule($module);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function photoUpdate(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
          'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
        $file = $request->file('avatar');
        $filename = $file->getClientOriginalName();
        $filename = md5($filename);
        $filename = microtime(true).$filename.'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('images', $filename, 'oci');

        $user->update([
          'avatar' => Storage::disk('oci')->url($path),
        ]);
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMentor(User $user)
    {
      $this->authorize('student-priv');
      if (!$user->allRoles()->contains('mentor')){
        abort(403);
      }
      $modules = Module::all()->pluck('code_title');
      if(!isset($modules)) {
          $modules = [];
        }
        $majors = Major::all();
        if(!isset($majors)) {
          $majors = [];
        }
        //dd($majors);
        return view('user.mentor', compact('majors', 'modules', 'user'));
    }
}
