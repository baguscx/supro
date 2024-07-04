<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\SuratProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    public function dashboard(){
        return redirect(route('list.proposal'));
        // return view('staff.index');
    }

    public function list(){
        $proposals = SuratProposal::whereIn('status', ["pending"])->get();
        return view('staff.list', compact('proposals'));
    }

    public function history(){
        $proposals = SuratProposal::whereIn('status', ["rejected", "completed", "revision"])->get();
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
            $proposal->ttd = Auth::user()->name;
            $proposal->save();
        } else {
            return "salah";
        }

        Alert::success('Sukses!', 'Proposal Berhasil Ditandatangani');
        return redirect()->route('list.proposal');
    }

    public function revisi(Request $request, $id){
        $proposal = SuratProposal::find($id);
        $proposal->status = "revision";
        $proposal->note = $request->note;
        $proposal->save();

        Alert::success('Sukses!', 'Proposal Berhasil untuk Direvisi');
        return redirect()->route('list.proposal');
    }

    public function tolak($id){
        $proposal = SuratProposal::find($id);
        $proposal->status = "rejected";
        $proposal->save();

        Alert::success('Sukses!', 'Proposal Berhasil Ditolak');
        return redirect()->route('list.proposal');
    }
}
