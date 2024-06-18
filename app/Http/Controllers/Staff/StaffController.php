<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\SuratProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function dashboard(){
        return view('staff.index');
    }

    public function list(){
        $proposals = SuratProposal::whereIn('status', ["pending"])->get();
        return view('staff.list', compact('proposals'));
    }

    public function history(){
        $proposals = SuratProposal::whereIn('status', ["rejected", "completed"])->get();
        return view('staff.history', compact('proposals'));
    }

    public function show($id){
        $proposals = SuratProposal::whereIn('status', ["rejected", "completed"])->get();
        $proposal = SuratProposal::find($id);
        return view('staff.show', compact('proposal', 'proposals'));
    }

    public function ttd(Request $request, $id){
        if(Hash::check($request->ttd, Auth::user()->password))
        {
            $proposal = SuratProposal::find($id);
            $proposal->status = "completed";
            $proposal->save();
        } else {
            return "salah";
        }
        return redirect()->route('list.proposal');
    }

    public function tolak($id){
        $proposal = SuratProposal::find($id);
        $proposal->status = "rejected";
        $proposal->save();
        return redirect()->route('list.proposal');
    }
}
