<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->get();
        return view('customer.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        return response()->json(['status' => 200, 'message' => 'User Found', 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;

            $file = $request->file('profile');

            if ($file) {
                $old_profile = $user->profile;
                $path = 'storage/profiles/';

                // Generate a unique filename for the new profile image
                $filename = 'PROFILE_IMG_' . time() . '.' . $file->getClientOriginalExtension();

                // Move the uploaded file to the storage/profiles directory
                if ($file->move(public_path($path), $filename)) {
                    // Check if the old profile exists before attempting to delete it
                    if ($old_profile && File::exists(public_path($path . $old_profile))) {
                        File::delete(public_path($path . $old_profile));
                    }
                    // Update the user's profile field with the new filename
                    $user->profile = $filename;
                }
            }

            $user->save();

            return response()->json(['status' => 200, 'message' => 'Updated successfully!']);
        }

        return response()->json(['status' => 404, 'message' => 'User not found!']);
    }


    

}
