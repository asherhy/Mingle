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
        $this->middleware('auth');
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $modules = Module::all();
        $majors = Major::all();
        //dd($majors);
        return view('user.show', compact('majors'));
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
        $user->update([
          'name' => $request->name,
          'telegram' => $request->telegram,
          'gender' => $request->gender,
          'matric_year' => $request->matricYear
        ]);
        $user->assignMajor((int)$request->major);
        return redirect()->back();
    }
}
