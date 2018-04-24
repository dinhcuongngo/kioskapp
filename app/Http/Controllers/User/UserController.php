<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role');
    }

    public function index()
    {
        //
        $users = User::all();
        return view('user.users',['users'=>$users]);
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

        return back()->with('success','Successfully registered!');
    }

    public function show(User $user)
    {
        //
        $data = User::findOrFail($user);

        return view('user.edit',['data'=>$data]);
    }


    public function update(Request $request, User $user)
    {
        //

        if($request->has('name'))
        {
            $user->name = $request->name;
        }

        if($request->has('email') && $user->email != $request->email)
        {
            $user->verified = User::UNVERIFIED_USER;
            $user->verification_token = User::generateVerificationCode();
            $user->email = $request->email;
        }

        if($user->isClean())
        {
            //return back()->with('fails', 'You need to specify the different value for update!');
            return back()->withErrors(['fails' => 'You need to specify the different value for update!']);
        }

        $user->save();

        return back()->with('success','Successfully updated!');
    }

    public function viewLogin()
    {
        return view('user.login');
    }

    public function viewChangePasswd($user)
    {
        //dd($user);
        return view('user.change',['user'=>$user]);
    }

    public function changePasswd(Request $request, User $user)
    {
        //dd($user);
        $rules = [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ];

        $this->validate($request, $rules);

        if(Hash::check($request->current_password, Auth::user()->password)){
            $user->password = bcrypt($request->password);
        }
        else
        {
            return back()->withErrors(['fails' => 'Authentication is failed!']);
        }
        
        if($user->isDirty())
        {
            $user->save();

            return back()->with('success',"Successfully changed password!");
        }
    }

    public function destroy(User $user)
    {
        //
        $user->delete();

        return back();
    }

}
