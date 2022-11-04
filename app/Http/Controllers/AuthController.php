<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FirstLogin;

class AuthController extends Controller
{
    public function __construct() {
        $this->loginView = 'auth.login';
    }
    
    public function index()
    {
        if(Auth::check()){
            return redirect(route('home'));
        }else{
            $title = __('menus.login');
            return view($this->loginView, [
                'title' => $title
            ]);  
        }

    }  
      
    public function login(Request $request)
    {
        if(!Auth::check()){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            $remember = $request->login_remember;
            $credentials = $request->only('email', 'password');
            if(User::where('email', '=', $credentials['email'])->exists()){
                if (Auth::attempt($credentials, $remember)) {
                    $user = auth()->user();
                    if($user->isActive()){
                        $request->session()->regenerate();
                        if(!($user->hasAnyLog())){
                            //Notification::send($user, new FirstLogin());
                            //Mail::send(new \App\Mail\VerifyEmail());
        
                        }
                        $user->makeLogin($request->ip());
                        session()->put('locale', $user->locale);
                        return redirect(route('home'));
                    } else {
                        Session::flush();
                        Auth::logout();
                        return redirect(route('suspended'));
                    }
    
                }
                else{
                    $user = User::where('email', $credentials['email'])->first();
                    $user->makeLoginFailed($request->ip());
                    return redirect(route($this->loginView))->with('alert', __('auth.failed'));
                }
    
            }
            else{
                return redirect(route($this->loginView))->with('alert', __('auth.failed'));
            }
        } else {
            return redirect('home');
        }

    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'surname' => $data['surname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect(route($this->loginView));
    }

    public function verifyEmail($id)
    {
        Mail::send(new \App\Mail\VerifyEmail());
        return redirect()->back()->with('emailSent', 'Freshly generated verification code has been sent to Your email address. Check your inbox.');
    }

    public function emailVerified($id)
    {
        $user = User::findOrFail($id);
        $user->update(['email_verified_at' => now()]);
        return view('misc.emailVerified', [
            'title' => 'Email Verified'
        ]);
    }
}