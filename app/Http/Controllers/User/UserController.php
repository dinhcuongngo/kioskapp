<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('guest');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
        ];
        $msg = [
            'name.required' => 'Username is required.',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required.', 
            'password.confirmed' => 'Passwords are not match.',
        ];

        $this->validate($request, $rules, $msg);

        // $request->verified  = User::UNVERIFIED_USER;
        // $request->verification_token = User::generateVerificationCode();
        // $request->admin     = User::ADMIN_USER;

        // User::create($request->all());

        $data =$request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] = User::generateVerificationCode();
        $data['admin']  = User::REGULAR_USER;

        User::create($data);

        return redirect('signup')->with('success','Successfully registered!');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }

    public function viewSignup()
    {
        return view('user.signup');
    }

    public function viewLogin()
    {
        return view('user.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->only([
            'email', 'password',
        ]);
        if(Auth::attempt($credentials))
        {
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
