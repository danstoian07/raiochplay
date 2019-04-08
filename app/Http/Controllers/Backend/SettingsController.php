<?php

namespace App\Http\Controllers\Backend;

use App\Analytics;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $active = 'settings';

        return view('backend.settings', compact('active'));
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required'
        ]);

        $file   = $request->file('avatar');
        if($file) {
            $file_name = $file->getClientOriginalName();
            if (file_exists('backend/avatar/' . $file_name)) {
                $file_name = rand(0, 99999).'_'.$file_name;
            }
            move_uploaded_file($file, "backend/avatar/" . $file_name);

            auth()->user()->update(['avatar' => $file_name]);
        }

        return redirect()->route('admin.settings.index')->with('message', 'Avatarul a fost schimbat!')->with('color', 'bg-green');
    }

    public function updatePassword(UpdateUserRequest $request)
    {
        if (!(Hash::check($request->get('old_pass'), auth()->user()->password))) {
            return redirect()->back()->with('message', 'Parola actuala nu este corecta!')->with('color', 'bg-pink');
        }
        if(strcmp($request->get('old_pass'), $request->get('new_pass')) == 0){
            //Current password and new password are same
            return redirect()->back()->with('message', 'Parola noua trebuie sa fie diferita!')->with('color', 'bg-pink');
        }

        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new_pass'));
        $user->save();

        return redirect()->route('admin.settings.index')->with('message', 'Parola a fost schimbata!')->with('color', 'bg-green');
    }

    public function updateAnalytics(Request $request)
    {
        $request->validate([
            'view_code' => 'required',
            'client_id' => 'required'
        ]);

        $analytics = Analytics::first();

        $analytics->update([
            'view_code' => $request->view_code,
            'client_id' => $request->client_id
        ]);

        return redirect()->route('admin.index')->with('message', 'Datele Google Analitics au fost salvate!')->with('color', 'bg-green');
    }
}
