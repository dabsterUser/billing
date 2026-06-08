<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Mail;
use App\Mail\VerificationOtpMail;
use Illuminate\Foundation\Auth\RegistersUsers;



class RegisteredUserController extends Controller
{

    protected $redirectTo = '/verify';

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'digits:10', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country_code' => '+91',
            'phone' =>$request->phone,
            'password' => Hash::make($request->password),
            'otp' => Str::random(6)
        ]);

        $encrypted = Crypt::encryptString($user->id);
        $user['encrypted'] = $encrypted;

        Mail::to($user->email)->send(new VerificationOtpMail($user));

        // $user->sendEmailVerificationNotification();

        event(new Registered($user));

        // Auth::login($user);
        $request->session()->put('user_id', $user->id);

        return redirect()->route('verify');

        // return redirect(RouteServiceProvider::VERIFY);
    }
}
