<div {{$attributes}} style="display: none;" class="row mt-2 gy-4">
    <div class="col-md-12">
        <small>Substansi Proposal : <strong>Kelompok KHUSUS</strong></small>
            <div class="mt-3 form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="ringkasan_khusus" placeholder="Ringkasan">{{$proposal->ringkasan_khusus ?? ''}}</textarea>
                <label class="ps-4">Ringkasan</label>
            </div>
    </div>

    <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="deskripsi_awal" placeholder="Deskripsi Awal Inovasi">{{$proposal->deskripsi_awal ?? ''}}</textarea>
                <label class="ps-4">Deskripsi Awal Inovasi</label>
            </div>
    </div>

    <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="pembaruan" placeholder="Pembaruan / Peningkatan Inovasi">{{$proposal->pembaruan ?? ''}}</textarea>
                <label class="ps-4">Pembaruan / Peningkatan Inovasi</label>
            </div>
    </div>

    <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="dampak" placeholder="Dampak">{{$proposal->dampak ?? ''}}</textarea>
                <label class="ps-4">Dampak</label>
            </div>
    </div>

    <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="adaptabilitas_khusus" placeholder="Adaptabilitas">{{$proposal->adaptabilitas_khusus ?? ''}}</textarea>
                <label class="ps-4">Adaptabilitas</label>
            </div>
    </div>

    <div class="col-md-12">
        <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-100" name="penguatan" placeholder="Penguatan Sumber Daya">{{$proposal->penguatan ?? ''}}</textarea>
            <label class="ps-4">Penguatan Sumber Daya</label>
        </div>
    </div>

    <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="strategi_penguatan" placeholder="Strategi Penguatan Keberlanjutan">{{$proposal->strategi_penguatan ?? ''}}</textarea>
                <label class="ps-4">Strategi Penguatan Keberlanjutan</label>
            </div>
    </div>

    {{-- <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="sumber_daya_khusus" placeholder="Sumber Daya">{{$proposal->sumber_daya_khusus ?? ''}}</textarea>
                <label class="ps-4">Sumber Daya</label>
            </div>
    </div>

    <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="strategi_keberlanjutan_khusus" placeholder="Strategi Keberlanjutan">{{$proposal->strategi_keberlanjutan_khusus ?? ''}}</textarea>
                <label class="ps-4">Strategi Keberlanjutan</label>
            </div>
    </div> --}}
</div>
