<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{

    public function index()
    {
        $title = __('menus.account_settings');
        $user = User::findOrFail(auth()->user()->id);
        return view('pages.profile.edit', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        //dd($request->input('locale'));
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->back()->with('generalSuccess', 'Updating your data is a success. In order to see all of the effects, You should relogin.');
    }

    public function passwordChange(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $oldPassword = Hash::make($request->input('oldPassword'));
        $currentPassword = $user->password;
        $newPassword = Hash::make($request->input('NewPassword'));
        $confirmPassword = Hash::make($request->input('confirmPassword'));
        if($oldPassword == $currentPassword){
            if($newPassword == $confirmPassword){
                $user->update(['password' => $newPassword]);
                return redirect()->back()->with('success', 'Changing your password is a success.');
            }
            else{
                return redirect()->back()->with('passwordError', "Your new passwords don't match.");
            }
        }
        else{
            return redirect()->back()->with('passwordError', 'Your old password is incorrect.');
        }

        
    }

    public function uploadAvatar(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $file = $request->file('avatar-upload');
        $name = $file->hashName();
        $file->storeAs('public/images/avatars', $name);

        $publicPath = 'storage/images/avatars/' . $name;
        $user->update(['avatar' => $publicPath]);

        return redirect()->back()->with('success', 'New photo uploaded.');
    }

    public function defaultAvatar($id)
    {
        $user = User::findOrFail($id);

        $path = 'storage/images/avatars/avatar-female.png';
        if($user->gender == '1')
            $path = 'storage/images/avatars/avatar-male.png';
    
        $user->update(['avatar' => $path]);

        return redirect()->back()->with('generalSuccess', 'Changed to default photo.');
    }
}
