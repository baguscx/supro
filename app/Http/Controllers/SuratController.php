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
        $qrCodes = QrCode::size(120)->generate('https://localhost:8000/cek/surat/'.$surat->id);
        $pdf = Pdf::loadView('components.surat', compact('surat', 'user', 'qrCodes'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function sp_inovator($id){
        $surat = SuratProposal::find($id);
        return response()->download(storage_path('app/public/'.$surat->sp_inovator));
    }

    public function sp_replikasi($id){
        $surat = SuratProposal::find($id);
        return response()->download(storage_path('app/public/'.$surat->sp_replikasi));
    }
}
