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
        return view('user.show', compact('majors', 'modules'));
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
        
        return redirect()->back();
    

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
          'modules' => ['required', 'array', 'max:5'],
          'matric' => ['required'],
          'gender' => ['required'],
          'name' => ['required'],
          'telegram' => ['required'],
          'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
        $file = $request->file('avatar');
        $filename = $file->getClientOriginalName();
        $filename = md5($filename);
        $filename = microtime(true).$filename.'.'.$file->getClientOriginalExtension();
        $request->avatar->storeAs('public/avatars', $filename);

        $user->update([
          'name' => $request->name,
          'telegram' => $request->telegram,
          'avatar' => $filename,
          'gender' => $request->gender,
          'matric_year' => $request->matric
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
}
