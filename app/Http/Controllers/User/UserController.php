<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\SuratProposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.index');
    }

    public function create(){
        return view('user.create',);
    }

    public function store(Request $request)
    {
            SuratProposal::create([
            'users_id' => Auth::user()->id,
            'judul_inovasi' => $request->judul_inovasi,
            'waktu_implementasi' => $request->waktu_implementasi,
            'kelompok_inovasi' => $request->kelompok_inovasi,
            'kategori_inovasi' => $request->kategori_inovasi,
            'target_sdgs' => $request->target_sdgs,
            'video_inovasi' => $request->video_inovasi,
            'sp_inovator' => $request->file('sp_inovator')->store('assets/file/sp_inovator', 'public'),
            'sp_replikasi' => $request->file('sp_replikasi')->store('assets/file/sp_replikasi', 'public'),
            'ringkasan' => $request->ringkasan,
            'ringkasan_khusus' => $request->ringkasan_khusus,
            'adaptabilitas' => $request->adaptabilitas,
            'adaptabilitas_khusus' => $request->adaptabilitas_khusus,
            'sumber_daya' => $request->sumber_daya,
            'sumber_daya_khusus' => $request->sumber_daya_khusus,
            'strategi_keberlanjutan' => $request->strategi_keberlanjutan,
            'strategi_keberlanjutan_khusus' => $request->strategi_keberlanjutan_khusus,
            'latar_belakang' => $request->latar_belakang,
            'kebaruan' => $request->kebaruan,
            'implementasi_inovasi' => $request->implementasi_inovasi,
            'signifikansi' => $request->signifikansi,
            'deskripsi_awal' => $request->deskripsi_awal,
            'pembaruan' => $request->pembaruan,
            'dampak' => $request->dampak,
            'penguatan' => $request->penguatan,
            'strategi_penguatan' => $request->strategi_penguatan,
            'status' => 'draft',
        ]);

        Alert::success('Sukses!', 'Proposal Berhasil Dibuat');
        return redirect()->route('user.dashboard');
    }

    public function sent(){
        $proposals = SuratProposal::where('users_id', Auth::user()->id)->whereIn('status', ['pending', 'rejected', 'completed'])->get();
        return view('user.sent', compact('proposals'));
    }

    public function draft(){
        $proposals = SuratProposal::where('users_id', Auth::user()->id)->where('status', 'draft')->get();
        return view('user.draft', compact('proposals'));
    }

    public function edit($id){
        $proposal = SuratProposal::find($id);
        if($proposal->status == 'draft'){
            if($proposal->users_id != Auth::user()->id){
                return abort(403);
            } else {
                return view('user.edit', compact('proposal'));
            }
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function show($id){
        $proposal = SuratProposal::find($id);
        if($proposal->status == 'completed' || $proposal->status == 'pending'){
            if($proposal->users_id != Auth::user()->id){
                return view('user.edit', compact('proposal'));
            } else {
                return view('user.edit', compact('proposal'));
            }
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function update(Request $request, $id){
        $proposal = SuratProposal::find($id);
        $get_inovasi = $proposal->sp_inovator;
        $get_replikasi = $proposal->sp_replikasi;

        if(isset($request->sp_inovator)){
            $data = 'storage/'.$get_inovasi;
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/'.$get_inovasi);
            }
        }

        if(isset($request->sp_replikasi)){
            $data = 'storage/'.$get_replikasi;
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/'.$get_replikasi);
            }
        }

        $proposal->update([
            // 'users_id' => Auth::user()->id,
            // 'judul_inovasi' => $request->judul_inovasi,
            // 'waktu_implementasi' => $request->waktu_implementasi,
            // 'kelompok_inovasi' => $request->kelompok_inovasi,
            // 'kategori_inovasi' => $request->kategori_inovasi,
            // 'target_sdgs' => $request->target_sdgs,
            // 'video_inovasi' => $request->video_inovasi,
            // 'sp_inovator' => $request->hasFile('sp_inovator') ? $request->file('sp_inovator')->store('assets/file/sp_inovator', 'public') : $proposal->sp_inovator,
            // 'sp_replikasi' => $request->hasFile('sp_replikasi') ? $request->file('sp_replikasi')->store('assets/file/sp_replikasi', 'public') : $proposal->sp_replikasi,
            'ringkasan' => $request->ringkasan,
            'ringkasan_khusus' => $request->ringkasan_khusus,
            'adaptabilitas' => $request->adaptabilitas,
            'adaptabilitas_khusus' => $request->adaptabilitas_khusus,
            'sumber_daya' => $request->sumber_daya,
            'sumber_daya_khusus' => $request->sumber_daya_khusus,
            'strategi_keberlanjutan' => $request->strategi_keberlanjutan,
            'strategi_keberlanjutan_khusus' => $request->strategi_keberlanjutan_khusus,
            'latar_belakang' => $request->latar_belakang,
            'kebaruan' => $request->kebaruan,
            'implementasi_inovasi' => $request->implementasi_inovasi,
            'signifikansi' => $request->signifikansi,
            'deskripsi_awal' => $request->deskripsi_awal,
            'pembaruan' => $request->pembaruan,
            'dampak' => $request->dampak,
            'penguatan' => $request->penguatan,
            'strategi_penguatan' => $request->strategi_penguatan,
            'status' => 'draft',
        ]);

        Alert::success('Sukses!', 'Proposal Berhasil Diedit');
        return redirect()->route('draft.proposal');
    }

    public function send(Request $request, $id){
        $proposal = SuratProposal::find($id);

        $proposal->update([
            'status' => 'pending',
        ]);

        Alert::success('Sukses!', 'Proposal Berhasil DiKirim');
        return redirect()->route('sent.proposal');
    }

    public function destroy($id){
        $proposal = SuratProposal::find($id);
        $get_inovasi = $proposal->sp_inovator;
        $get_replikasi = $proposal->sp_replikasi;

        $data = 'storage/'.$get_inovasi;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/'.$get_inovasi);
        }

        $data = 'storage/'.$get_replikasi;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/'.$get_replikasi);
        }

        $proposal->delete();

        Alert::success('Sukses!', 'Proposal Berhasil DiHapus');
        return redirect()->route('sent.proposal');
    }

    public function dinovator($id){
        // Cari detail surat berdasarkan ID
        $proposal = SuratProposal::findOrFail($id);
        // Unduh berkas menggunakan response()->download()
        return response()->download(storage_path('app/public/' . $proposal->sp_inovator));
    }

    public function dinovasi($id){
        // Cari detail surat berdasarkan ID
        $proposal = SuratProposal::findOrFail($id);
        // Unduh berkas menggunakan response()->download()
        return response()->download(storage_path('app/public/' . $proposal->sp_replikasi));
    }
}
