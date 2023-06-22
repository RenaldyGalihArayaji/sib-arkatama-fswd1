<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordChangeController extends Controller
{
    public function changePassword()
    {
        return view('pengaturan.change-password',["title" => "change-password"]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('change-password')->with('success', 'Password changed successfully.');
        } else {
            return redirect('change-password')->with('error', 'Current password is incorrect.');
        }
    }

    public function changePasswordUser()
    {
        return view('home-page.change-passwordUser',["title" => "change-passwordUser"]);
    }

    public function updatePasswordUser(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect('/change-passwordUser')->with('success', 'Password changed successfully.');
        } else {
            return redirect('/change-passwordUser')->with('error', 'Current password is incorrect.');
        }
    }
}
