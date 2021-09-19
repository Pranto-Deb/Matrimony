<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(auth()->check() && auth()->user()->role == User::Roles['admin'])
        {
            return redirect()->route('admin.dashboard');
        }
        else if(auth()->check() && auth()->user()->role == User::Roles['manager']){
            return redirect()->route('manager.dashboard');
        }
        else if(auth()->check() && auth()->user()->role == User::Roles['user']){
            return redirect()->route('customer.dashboard');
        }
    }

    public function user_dashboard()
    {
        $user = User::where('id', auth()->id())->get();
        $proposals = Proposal::where('receiver_id', auth()->id())->with('sender')->simplePaginate(10);
        return view('customer.dashboard', compact('proposals', 'user'));
    }

    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function manager_dashboard()
    {
        return view('admin.dashboard');
    }

}