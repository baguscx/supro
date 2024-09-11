<?php

namespace App\Http\Controllers;

use App\Models\SuratProposal;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratController extends Controller
{
    public function cetak($id){
        $surat = SuratProposal::find($id);
        $user = User::find($surat->users_id);
        if($surat->status == 'completed' || $surat->status == 'revision' || $surat->status == 'pending'){
            if($surat->users_id == auth()->user()->id || auth()->user()->hasRole('staff')){
                $qrCodes = QrCode::size(120)->generate(url('/cek/surat/'.$surat->id));
                $pdf = Pdf::loadView('components.surat', compact('surat', 'user', 'qrCodes'))->setPaper('a4', 'portrait');
                return $pdf->stream();
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function show_proposal($id){
        $surat = SuratProposal::find($id);
        $user = User::find($surat->users_id);
        if($surat->status == 'pending'){
            if($surat->users_id == auth()->user()->id || auth()->user()->hasRole('staff')){
                $qrCodes = QrCode::size(120)->generate('https://localhost:8000/cek/surat/'.$surat->id);
                $pdf = Pdf::loadView('components.surat', compact('surat', 'user', 'qrCodes'))->setPaper('a4', 'portrait');
                return $pdf->stream();
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function sp_inovator($id){
        $surat = SuratProposal::find($id);
        return response()->download(storage_path('app/public/'.$surat->sp_inovator));
    }

    public function sp_replikasi($id){
        $surat = SuratProposal::find($id);
        return response()->download(storage_path('app/public/'.$surat->sp_replikasi));
    }

    public function detail_proposal($id){
        $surat = SuratProposal::find($id);
        $user = User::find($surat->users_id);
        return view('components.detail_proposal', compact('surat', 'user'));
    }
}
