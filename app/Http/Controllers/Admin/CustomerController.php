<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;

class CustomerController extends Controller
{
    public function search(Request $request)
    {
    	$search = $request->search;
            $users = User::where('name', 'like', '%'.$search.'%')
                        ->where('role', '1')
                        ->where('status', '1')
                        ->where('gender', '!=', auth()->user()->gender)
                        ->get();
            
            return view('customer.search.search_profile', compact('users'));
    }

    public function proposal(Request $request, $id)
    {
        $proposal = new Proposal();
        $proposal->sender_id = auth()->user()->id;
        $proposal->receiver_id = $request->id;
        $proposal->status = 0;
        $proposal->save();
        return redirect()->back();
    }

    public function sendProposal()
    {
        $proposals = Proposal::where( 'sender_id', auth()->id())->with('receiver')->simplePaginate(10);
        return view('customer.interest.proposals', compact('proposals'));
    }

    public function cancel($id)
    {
        $proposal = Proposal::find($id);
        $proposal->delete();
        return redirect()->back();    
    }

    public function receiveProposal($id)
    {
        $proposal = Proposal::find($id);
        $proposal->status = 1;
        $proposal->save();
        return redirect()->back();   
    }

    public function reject($id)
    {
        $proposal = Proposal::find($id);
        $proposal->status = 2;
        $proposal->save();
        return redirect()->back();   
    }
    
   
}
