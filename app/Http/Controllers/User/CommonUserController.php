<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonUserController extends Controller
{

    public function viewSignUp()
    {
        return view('user.signup');
    }

    public function signUp(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ];
        $msg = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email is already existed.',
            'password.required' => 'The password field is required',
            'password.min'  => 'The length of password is at least 6 characters',
            'password.confirmed' => 'The passwords are not match.', 
        ];

        $this->validate($request, $rules, $msg);
        $users = $request->all();

        $users['password']  = bcrypt($request->password);
        $users['verified']  = User::UNVERIFIED_USER;
        $users['verification_token'] = User::generateVerificationCode();
        $users['admin']     = User::ADMIN_USER;


        User::create($users);

        return back()->with('success','Successfully added new user!');
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }

    public function viewLogin()
    {
        return view('user.login');
    }

    //Checking user for login
    public function checkLogin(Request $request)
    {
        $credentails = $request->only([
            'email',
            'password',
        ]);

        if(Auth::attempt($credentails))
        {
            return redirect()->route('home');
        }
        else
        {
            return view('user.login')->with('fails','Login failed!');
            //return redirect('signup')->with('success','Successfully registered!');
        }

    }

    //logout
    public function logOut()
    {
        Auth::logout();

        return redirect('/');
    }
}
