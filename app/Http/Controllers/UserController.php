<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\TokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function login() {
        return view('login');
    }

    public function doLogin(Request $request) {
        // get input
        $username = $request->input('username');
        $passpord = $request->input('password');

        // validation input
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        // authorization  user
       if(Auth::attempt([
        'name' => $validated['username'],
        'password' => $validated['password']
       ])) {
         $request->session()->regenerate();

         return redirect()->route('dashboard');

       } 


       return back()->with('error','Username or Password wrong !!')->withInput();
    }


    public function register() {
        return view('register');
    }

    public function doRegister(Request $request, User $user) {
       $inputs = $request->all(); 

       $validated = $request->validate([
        'username' => 'required',
        'email' => 'required|email:rfc',
        'password' => ['required','confirmed',Password::min(8)],
        'token' => [
            'required',
            function ($attribute, $value, $fail, ) {
                $tokenService = app(TokenService::class);
                if($value != $tokenService->getToken()) {
                    $fail('Token is invalid !');
                }
            }
            
        ]
       ]);


      User::create([
        'name' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user'
      ]);



      return redirect()->route('login')->with('message', 'Berhasil buat Akun, silakan login !');
    }

    /*
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
