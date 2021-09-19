<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = User::where('role', 3)->orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.manager.index', compact('managers'));
    }

    public function create()
    {
        return view('admin.manager.create_update');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_no' => 'required|max:13',
		]);

        $manager = new User();
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->phone_no = $request->phone_no;
        $manager->status = $request->status;
        $manager->role = User::Roles['manager'];
        $manager->password = Hash::make(123456789);
        $manager->save();

    	return redirect()->route('admin.manager')->with('success', 'A manager added successfully!!');   
    }

    public function edit($id)
    {
    	$manager = User::find($id);
        return view('admin.manager.create_update', compact('manager'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_no' => 'required|max:13',
		]);

        $manager = User::find($id);
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->phone_no = $request->phone_no;
        $manager->status = $request->status;
        $manager->role = User::Roles['manager'];
        $manager->save();

    	return redirect()->route('admin.manager')->with('success', 'A manager updated successfully!!'); 
    }

    public function delete($id)
    {
    	$manager = User::find($id);
        $manager->delete();

        return redirect()->back()->with('success', 'A manager deleted successfully!!');
    }

}
