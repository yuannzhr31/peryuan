<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::All();
        // $ruangans = "Cek data";

        return view('users/index', compact('users'));
    }

    public function create(){
        // $roles = Role::All();
        return view('users/create');
    }

    public function store(Request $request)
    {  
        // dd($request);
        $request->validate([
            'nm_anggota' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'hak_alses' => 'required|in:admin,anggota',
        ]);
           
        $data = $request->all();
        // dd($data);
        $check = User::create([
            'nm_anggota' => $data['nm_anggota'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'hak_alses' =>$data['hak_alses']
        ]);
         
        return redirect()->route('users.index')->withSuccess('Great! You have Successfully loggedin');
    }

    public function edit(User $user)
    {   
        // $roles = Role::All();
        // return view('users.edit', compact('user', 'roles'));
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nm_anggota' => 'required',
            'email' => 'required|email',
            'hak_alses' => 'required|in:admin,anggota',
        ]);
        $user->nm_anggota = $request->nm_anggota;
        $user->email = $request->email;
        $user->hak_alses = $request->hak_alses;
        if(!empty($request->password)) $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->withSuccess('Great! You have Successfully loggedin');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','user has been deleted successfully');
    }

}
