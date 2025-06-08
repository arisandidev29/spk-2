<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\TokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        // get input
        $username = $request->input('username');
        $passpord = $request->input('password');

        // validation input
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        // authorization  user
        if (Auth::attempt([
            'name' => $validated['username'],
            'password' => $validated['password']
        ])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }


        return back()->with('error', 'Username or Password wrong !!')->withInput();
    }


    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request, User $user)
    {
        $inputs = $request->all();

        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email:rfc',
            'password' => ['required', 'confirmed', Password::min(8)],
            'token' => [
                'required',
                function ($attribute, $value, $fail,) {
                    $tokenService = app(TokenService::class);
                    if ($value != $tokenService->getToken()) {
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


    public function profile()
    {
        return view('profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }





    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', Rule::unique('users')->ignore(Auth::id())],
            'email' => ['required', 'email:rfc', Rule::unique('users')->ignore(Auth::id())],
            'profile_pic' => ['nullable', File::image()->max('2mb')],
        ]);


        $user = User::where('id', Auth::id())->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);


        if ($request->file('profile_pic')) {
            $user = auth()->user();
            $filename = "avatar_{$user->name}_{$user->id}." . $request->file('profile_pic')->getClientOriginalExtension();

            // delete old profile pic 
            Storage::delete("/user" . $filename);

            // insert new profile pic
            $request->file('profile_pic')->storeAs('user', $filename, 'public');
            $user->profile_pic = "storage/user/" . $filename;
            $user->save();
        }

        return back()->with('success', 'Profile updated successfully!');
    }


    public function changePassword()
    {
        return view('changePassword');
    }

    public function doChangePassword(Request $request, TokenService $token)
    {
        $request->validate([
            "email" => "required|exists:users,email",
            "token" => [
                "required",
                function ($attribute, $value, $fail,) {
                    $tokenService = app(TokenService::class);
                    if ($value != $tokenService->getToken()) {
                        $fail('Token is invalid !');
                    }
                }
            ]
        ]);

        $user = User::where('email',$request->input('email'))->get()->first();


        $tokenSetPassword = Str::uuid()->toString();
        session([
            'userHasSet' => $user->id,
            'access_setPassword' => $tokenSetPassword
        ]);

        return redirect()->route('setNewPassword');
    }

    public function setNewPassword() {
        if(!session()->has('access_setPassword')) {
            return back();
        }

        return view('setPassword');
    }

    public function doSetNewPassword(Request $request) {
        $request->validate([
            'newPassword' => ["required",Password::min(8)]
        ]);


        $user = User::find(session()->get('userHasSet'));

        $user->password = Hash::make($request->input('newPassword'));

        $user->save();

        session()->forget(['userHasSet','access_setPassword']);


        if(Auth::check()) {
            return redirect()->route('profile.view')->with('success','password successfully change');
        }

        return redirect()->route('login')->with('message','password successfully change');
    }
}
