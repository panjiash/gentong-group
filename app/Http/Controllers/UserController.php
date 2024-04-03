<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function login_store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $userExists = User::where("email", $email)->whereNotNull("role")->whereNotNull('company')->exists();
        if ($userExists) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended('/home');
            } else {
                return redirect()->route('login')->with(['error' => 'Wrong email or password'])->withInput();
            }
        } else {
            return redirect()->route('login')->with(['error' => 'Wrong email or password'])->withInput();
        }
    }

    public function register()
    {
        return view("register");
    }

    public function register_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            // 'id' => \Illuminate\Support\Str::uuid(),
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        if ($user) {
            return redirect()->route('login')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('register')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
