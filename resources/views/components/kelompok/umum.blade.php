    <div {{$attributes}} style="display: none;" class="row mt-2 gy-4">
        <div class="col-md-12">
            <small>Substansi Proposal : <strong>Kelompok UMUM</strong></small>
                <div class="mt-3 form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="ringkasan" placeholder="Ringkasan" required>{{$proposal->ringkasan ?? ''}}</textarea>
                    <label class="ps-4">Ringkasan</label>
                </div>
        </div>

        <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="latar_belakang" placeholder="Latar Belakang & Tujuan" required>{{$proposal->latar_belakang ?? ''}}</textarea>
                    <label class="ps-4">Latar Belakang & Tujuan</label>
                </div>
        </div>

        <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="kebaruan" placeholder="Kebaruan / Nilai Tambah" required>{{$proposal->kebaruan ?? ''}}</textarea>
                    <label class="ps-4">Kebaruan / Nilai Tambah</label>
                </div>
        </div>

        <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="implementasi_inovasi" placeholder="Implementasi Inovasi" required>{{$proposal->implementasi_inovasi ?? ''}}</textarea>
                    <label class="ps-4">Implementasi Inovasi</label>
                </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="signifikansi" placeholder="Signifikansi" required>{{$proposal->signifikansi ?? ''}}</textarea>
                <label class="ps-4">Signifikansi</label>
            </div>
        </div>

        <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="adaptabilitas" placeholder="Adaptabilitas" required>{{$proposal->adaptabilitas ?? ''}}</textarea>
                    <label class="ps-4">Adaptabilitas</label>
                </div>
        </div>

        <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="sumber_daya" placeholder="Sumber Daya" required>{{$proposal->sumber_daya ?? ''}}</textarea>
                    <label class="ps-4">Sumber Daya</label>
                </div>
        </div>

        <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                    <textarea class="form-control h-px-100" name="strategi_keberlanjutan" placeholder="Strategi Keberlanjutan" required>{{$proposal->strategi_keberlanjutan ?? ''}}</textarea>
                    <label class="ps-4">Strategi Keberlanjutan</label>
                </div>
        </div>
    </div>
