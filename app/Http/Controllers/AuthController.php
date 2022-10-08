<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use Mail;
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
            return redirect(route('index'));
        }else{
            $title = __('menus.login');
            return view($this->loginView, [
                'title' => $title
            ]);  
        }

    }  
      
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $remember = $request->login_remember;
        $credentials = $request->only('email', 'password');
        if(User::where('email', '=', $credentials['email'])->exists()){
            $isActive = User::select('status')->where('email', 'like', $credentials['email'])->get();
            if($isActive[0]->status){
                if (Auth::attempt($credentials, $remember)) {
                        $user = auth()->user();
                        $fullname = $user->name . $user->surname;
                        $request->session()->regenerate();
                        if(!(Log::where(['user_id' => $user->id, 'action' => 'login'])->exists())){
                            //Notification::send($user, new FirstLogin());
                            //Mail::send(new \App\Mail\VerifyEmail());

                        }
                        Log::create([
                            'user_id' => $user->id,
                            'ip' => $request->ip(),
                            'action' => 'login'
                        ]);
                        session()->put('locale', $user->locale);
                        return redirect(route('home'));
                }
                else{
                    $userId = User::select('id')->where('email', $credentials['email'])->first();
                    Log::create([
                        
                        'user_id' => $userId->id,
                        'ip' => $request->ip(),
                        'action' => 'login_failed'
                    ]);
                    return redirect(route($this->loginView))->with('alert', __('auth.failed'));
                }
            }
            else{
                return redirect(route('suspended'));
            }

        }
        else{
            return redirect(route($this->loginView))->with('alert', __('auth.failed'));
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