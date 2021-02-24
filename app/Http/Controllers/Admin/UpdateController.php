<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UpdateController extends Controller
{
    public function updateProfile(Request $request)
    {
    	$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_no' => 'required|max:13',
		]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->gender = $request->gender;
        $user->address = $request->address;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $user->image = $name;
        }
        $user->save();

        session()->flash('success', 'User profile has updated successfully !!');
    	return redirect()->route('customer.dashboard'); 
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|different:current_password|confirmed',
		]);

        $user = Auth::user();
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

    	session()->flash('success', 'User password has Changed successfully !!');
        return redirect()->back(); 
    }
}
