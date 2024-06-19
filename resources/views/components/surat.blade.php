<title>Proposal | {{$surat->judul_inovasi}}</title>
<style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .logo {
            width: 10%; /* Sesuaikan dengan lebar logo */
            float: left;
            margin-right: 1px;
            padding-right: 1px;
            /* margin-right: 1px; Sesuaikan jarak antara logo dan teks */
            /* margin-top: 5px; Menyamakan tinggi logo dengan teks */
            margin-bottom: 15px; //Menyamakan tinggi logo dengan teks
            z-index: 200;
        }
        .logo > img {
            margin-right: 1px;
            /* margin-left: 100px; */
            padding-right: 1px;
            width: 80px;
            height: auto;
            align-items: center;
            text-align: center;
        }

        h4,h3,h2,.hp {
            text-align: center;
            margin: 0;
        }

        .kop h1{
            margin: 0;
        }

        .kop {
            margin-right: 100px;
            padding-right: 100px;
            width: 90%;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            margin-left: 1px;
            padding-left: 1px; /* Sesuaikan dengan jarak antara logo dan teks */
            padding-top: 10px; /* Menyamakan tinggi teks dengan logo */
            padding-bottom: 20px; /* Menyamakan tinggi teks dengan logo */
        }

        .line {
            border-top: 3px solid black;
            height: 2px;
            border-bottom: 1px solid black;
        }

                .ttd {
            margin-top: 20px;
        }

        .ttd-kiri,
        .ttd-kanan {
            width: 50%; /* Bagi ruang secara merata antara tanda tangan */
            float: left;
            text-align: left;
        }

        .ttd-kanan {
            text-align: right;
        }

        /* css qr */
        .qr-container {
            position: relative;
            display: flex;
            justify-content: center; /* aligns children horizontally (logo and QR code) */
            align-items: center; /* aligns children vertically (logo and QR code) */
            height: 15px; /* adjust the height as needed */
        }
        .object-a {
            position: absolute;
            top: 50%; /* Menggeser logo ke tengah vertikal */
            left: 50%; /* Menggeser logo ke tengah horizontal */
            transform: translate(-50%, -50%); /* Membuat logo berada di tengah-tengah */
        }
        .lego {
            position: absolute;
            top: 50%; /* Menggeser logo ke tengah vertikal */
            left: 50%; /* Menggeser logo ke tengah horizontal */
            transform: translate(-50%, -50%); /* Membuat logo berada di tengah-tengah */
            z-index: 2; /* Pastikan logo berada di lapisan terdepan */
        }
</style>

    <div class="header">
        <div class="logo">
        <img src="assets/img/logo.png" alt="logo" class="logo">
        </div>
        <div class="kop">
            <h2>PEMERINTAH KABUPATEN PASURUAN</h2>
            <h1>{{$user->name}}</h1>
            <p class="hp">{{$user->detail_users->address   }}</p>
        </div>
    </div>
    <hr class="line"/>

@if(@empty($surat))
    <div class="alert alert-danger" role="alert">
        Surat tidak ditemukan
    </div>
@else
    <h3 style="margin-top:20px"><center>Proposal Inovasi</center></h3>
<p>
    <b>1. Judul Inovasi</b><br>
    {{$surat->judul_inovasi}}
</p>
<p>
    <b>2. Waktu Mulai Implementasi</b><br>
    {{$surat->waktu_implementasi}}
</p>
<p>
    <b>3. Kelompok Inovasi</b><br>
    {{$surat->kelompok_inovasi}}
</p>
<p>
    <b>4. Kategori Inovasi</b><br>
    {{$surat->kategori_inovasi}}
</p>
<p>
    <b>5. Target SDGS</b><br>
    {{$surat->target_sdgs}}
</p>
<p>
    <b>6. Link Video Inovasi</b><br>
    {{$surat->video_inovasi}}
</p>
<p>
    <b>7. Surat Pernyataan Inovator</b><br/>
    {{ url("sp_inovator/$surat->id/download") }}
</p>
<p>
    <b>8. Surat Pernyataan Kesediaan Replikasi Inovasi</b><br/>
    {{url("sp_replikasi/$surat->id/download")}}
</p>

<h3 style="margin-top: 20px"><center>Subtansi Proposal ({{$surat->kelompok_inovasi}})</center></h3>
@if($surat->kelompok_inovasi == "Kelompok Umum")
    <p>
        <b>Ringkasan</b><br/>
        {{$surat->ringkasan}}
    </p>
    <p>
        <b>Latar Belakang dan Tujuan</b><br/>
        {{$surat->latar_belakang}}
    </p>
    <p>
        <b>Kebaruan/Nilai Tambah</b><br/>
        {{$surat->kebaruan}}
    </p>
    <p>
        <b>Implementasi Inovasi</b><br/>
        {{$surat->implementasi_inovasi}}
    </p>
    <p>
        <b>Signifikansi</b><br/>
        {{$surat->signifikansi}}
    </p>
    <p>
        <b>Adaptabilitas</b><br/>
        {{$surat->adaptabilitas}}
    </p>
    <p>
        <b>Sumber Daya</b><br/>
        {{$surat->sumber_daya}}
    </p>
    <p>
        <b>Strategi Keberlanjutan</b><br/>
        {{$surat->strategi_keberlanjutan}}
    </p>
@elseif($surat->kelompok_inovasi == "Kelompok Khusus")
    <p>
        <b>Ringkasan</b><br/>
        {{$surat->ringkasan_khusus}}
    </p>
    <p>
        <b>Deskripsi Awal Inovasi</b><br/>
        {{$surat->deskripsi_awal}}
    </p>
    <p>
        <b>Pembaruan/Peningkatan Inovasi</b><br/>
        {{$surat->pembaruan}}
    </p>
    <p>
        <b>Dampak</b><br/>
        {{$surat->dampak}}
    </p>
    <p>
        <b>Adaptabilitas</b><br/>
        {{$surat->adaptabilitas_khusus}}
    </p>
    <p>
        <b>Penguatan Sumber Daya</b><br/>
        {{$surat->sumber_daya_khusus}}
    </p>
    <p>
        <b>Strategi Penguatan</b><br/>
        {{$surat->strategi_penguatan}}
    </p>
    @endif
@endif

<div class="ttd">
    <div class="ttd-kiri" style="text-align: center">

    </div>
    <div class="ttd-kanan" style="text-align: center">
        <br>
        <br>
        <p style="margin-bottom: 5px;">Pasuruan, {{\Carbon\Carbon::parse($surat->created_at)->isoFormat('D MMMM YYYY') ?? ''}}
            <br>Mengetahui dan Menyetujui
            <br>Verifikator,</p>
        <br>
        <br>
        <br>
            @if ($surat->status == "completed")
                <div class="qr-container">
                    <img style="width: 20px" src="{{asset('assets/img/logo.png')}}" class="lego" alt="">
                    <img class="object-a" src="data:image/png;base64, {!! base64_encode(QrCode::size(100)->generate('http://127.0.0.1:8000/cek/surat/'.$surat->id)) !!} ">
                </div>
                <br>
                <br>
                <p style="margin-top: 20px;"><u><b>{{$surat->ttd}}</b></u></p>
            @else
                <br>
                <br>
                <p style="margin-top: 20px;"><u><b>_________________</b></u></p>
            @endif
    </div>
</div>
