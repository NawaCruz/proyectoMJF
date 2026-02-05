<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            if ($errors->has('password') && !$errors->has('password_confirmation')) {
                $errors->add('password_confirmation', $errors->first('password'));
            }

            return back()
                ->withErrors($errors)
                ->onlyInput(['name', 'email']);
        }

        $nameColumn = Schema::hasColumn('users', 'nombre') ? 'nombre' : 'name';

        try {
            $user = User::create([
                $nameColumn => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        } catch (\Throwable $e) {
            report($e);

            return back()
                ->withErrors(['general' => 'No se pudo crear la cuenta. Intenta de nuevo.'])
                ->onlyInput(['name', 'email']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/');
    }
}
