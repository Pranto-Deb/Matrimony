<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 1)->orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create_update');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_no' => 'required|max:13',
		]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->age = $request->age;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->password = Hash::make(123456789);

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


        if(auth()->user()->role == "2"){
            return redirect()->route('admin.user')->with('success', 'A user added successfully!!');
        }
        else
        {
            return redirect()->route('manager.user')->with('success', 'A user added successfully!!');   
        }
    }

    public function show($id)
    {
        $users = User::where('role', 1)->orderBy('id', 'desc')->simplePaginate(10);
    	$user = User::find($id);
        return view('admin.user.show', compact('user', 'users'));
    }

    public function updateStatus($id, $status)
    {
    	$user = User::where('id', $id)->first();
        $user->status = $status;
        $user->save();
        return redirect()->back();
    }

    public function edit($id)
    {
    	$user = User::find($id);
        return view('admin.user.create_update', compact('user'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_no' => 'required|max:13',
		]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->age = $request->age;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->password = Hash::make(123456789);

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

        if(auth()->user()->role == "2"){
            return redirect()->back()->with('success', 'A user updated successfully!!');
        }
        else
        {
            return redirect()->route('manager.user')->with('success', 'A user updated successfully!!');   
        }
    }

    public function delete($id)
    {
    	$user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'A user deleted successfully!!');
    }

}