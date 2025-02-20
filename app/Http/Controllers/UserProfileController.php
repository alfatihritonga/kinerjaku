<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ]);
        
        $user = User::findOrFail(Auth::id());
        $user->update($request->all());

        return back()->with('success', 'Profile berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);
        
        $user = User::findOrFail(Auth::id());
        
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
        
            return back()->with('success', 'Password berhasil diubah');
        } else {
            return back()->with('error', 'Password lama tidak valid');
        }
    }
}
