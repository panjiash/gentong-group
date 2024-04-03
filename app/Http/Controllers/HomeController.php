<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $email = auth()->user()->email;
        $role = auth()->user()->role;
        $company = auth()->user()->company;
        if ($role === "admin" || $role === "supervisor") {
            $users = User::where("email", '!=', $email)->where("company", $company)->where("role", "!=", "admin")->orderby('name')->orderby('company')->get();
        } else if ($role === "manager" && $company === 'pt xyz') {
            $users = User::where("email", '!=', $email)->where("role", "!=", "admin")->orderby('name')->orderby('company')->get();
        } else if ($role === "user") {
            $users = User::where("email", $email)->orderby('name')->orderby('company')->get();
        }
        return view("home.index", compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required',
            'role' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            // 'id' => \Illuminate\Support\Str::uuid(),
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $request->role,
            'company' => auth()->user()->company
        ]);

        if ($user) {
            return redirect()->route('home')->with(['success' => 'Data has been saved!']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed!']);
        }
    }

    public function edit($id)
    {
        $user = User::where("id", $id)->get();
        if (!$user) {
            return redirect()->route('home')->with(['error' => 'Data not found!']);
        }
        return view("employee.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {
            $email = $request->email;
            $cek_email = User::where('email', $email)->where('id', '!=', $id)->count();
            if ($cek_email > 0) {
                return redirect()->route('home')->with(['error' => 'Email already exist!']);
            } else {
                User::where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'company' => $request->company,

                ]);
                return redirect()->route('home')->with(['success' => 'Data has been updated!']);
            }
        } else {
            return redirect()->route('home')->with(['error' => 'Data not saved!']);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user = User::where("id", $id)->get();
        if ($user) {
            User::destroy(["id", $id]);
            return redirect()->route('home')->with(['success' => 'Data has been deleted!']);
        } else {
            return redirect()->route('home')->with(['error', 'User not found!']);
        }
    }
}
