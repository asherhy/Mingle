<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Major;
use App\Module;
use App\Providers\RouteServiceProvider;
use App\Rules\NusNetOnly;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        $modules = Module::all();
        if(!isset($modules)) {
          $modules = [];
        }
        $majors = Major::all();
        if(!isset($majors)) {
          $majors = [];
        }
        $emails = User::all()->pluck('email');
        return view('auth.register', compact('modules', 'majors', 'emails'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new NusNetOnly],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'majors' => ['required', 'array', 'max:3'],
            'modules' => ['required', 'array', 'max:5'],
            'matric' => ['required'],
            'gender' => ['required'],
            'name' => ['required'],
            'telegram' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telegram' => $data['telegram'],
            'gender' => $data['gender'],
            'matric_year' => $data['matric']
        ]);

        foreach($data['majors'] as $major) {
            $user->assignMajor($major);
          }
          foreach($data['modules'] as $module) {
            $user->assignModule($module);
          }

        $user->assignRole('student');
        return $user;
    }
}
