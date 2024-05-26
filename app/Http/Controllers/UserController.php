<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', 'unique:users,email'],
            'is_admin' => 'boolean'
        ]);

        // $rawPassword = Str::random(8);
        $rawPassword = '12345678';
        $data['password'] = bcrypt($rawPassword);
        $data['email_verified_at'] = now();

        User::create($data);

        return redirect()->back();
    }

    public function changeRole(User $user)
    {
        $user->update(['is_admin' => !(bool) $user->is_admin]);

        $message = "Le rôle de l'utilisateur a changé en " . ($user->is_admin ? '"Admin"' : '"Utilisateur Régulier"');

        return response()->json(['message', $message]);
    }

    public function blockUnblock(User $user)
    {
        if ($user->blocked_at) {
            $user->blocked_at = null;
            $message = 'Votre compte a été activé';
        } else {
            $user->blocked_at = now();
            $message = 'Votre compte a été bloqué';
        }
        $user->save();

        return response()->json(['message', $message]);
    }
}