<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth_user');
    }

    public function index() {
        return view('new-admin.dashboard', ['title' => "Dashboard"]);
    }

    public function upload_photo(Request $request) {
        $Required = ['file' => 'required|file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024'];
        $Message = [
            'file.required' => 'You must select a file.',
            'file.file' => 'File did not upload to server.',
            'file.image' => 'Your selected file must be image.',
            'file.mimes' => 'Uploaded file must be jpg, jpeg or png.',
            'file.max' => 'Uploaded file cannot be more than  1024KB.',
        ];

        $request->validate($Required, $Message);

        $File = $request->file->store('public');

        return response(['status' => true, 'url' => \Storage::url($File)]);
    }

    public function password_change_view(Request $request) {
        return view('new-admin.Profile.password_change', ['title' => 'Change Password']);
    }

    public function password_change(Request $request) {
        $Required = [
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ];
        $Message = [
            'old_password.required' => 'You must enter your current password.',
            'new_password.required' => 'You must enter new password.',
            'new_password.min' => 'New password must be 8 charcter or more.',
            'new_password.confirmed' => 'New password and confirm new password does not match.',
        ];

        $request->validate($Required, $Message);

        $Data = \App\User::find(auth()->id());

        if (!\Hash::check($request->old_password, $Data->password)) {
            return response(['message' => "Your current password does not match with given current password."], 422);
        }

        $Data->password = bcrypt($request->new_password);
        $Data->save();

        return response(['message' => "Password updated successfully."]);
    }

}
