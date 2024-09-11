<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Proposal Inovasi</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body pt-2 mt-1">
                        <form id="formAccountSettings" method="POST" action="{{route('store.proposal')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2 gy-4">
                                <div class="col-md-12">
                                    <small>Isian Umum</small>
                                    <div class="mt-3 form-floating form-floating-outline">
                                        <x-ui.text-input id="judul_inovasi" name="judul_inovasi" type="text" placeholder="Judul Inovasi" required/>
                                        <label for="judul_inovasi">Judul Inovasi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <x-ui.text-input id="waktu_implementasi" name="waktu_implementasi" type="date" required/>
                                        <label for="waktu_implementasi">Waktu Implementasi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <select id="kelompok_inovasi" name="kelompok_inovasi" class="form-select form-select-lg" onchange="showCard(this.value)"  required>
                                            <option>----------------Kelompok Inovasi----------------</option>
                                            <option value="Kelompok Umum">Kelompok Umum</option>
                                            <option value="Kelompok Khusus">Kelompok Khusus</option>
                                        </select>
                                        <label for="kelompok_inovasi">Kelompok Inovasi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <select id="kategori_inovasi" name="kategori_inovasi" class="form-select form-select-lg" required>
                                            <option>----------------Kategori Inovasi----------------</option>
                                            <option value="Kesehatan">Kesehatan</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Pertumbuhan ekonomi dan kesempatan kerja">Pertumbuhan ekonomi dan kesempatan kerja</option>
                                            <option value="Pengentasan kemiskinan">Pengentasan kemiskinan</option>
                                            <option value="Ketahanan pangan">Ketahanan pangan</option>
                                            <option value="Pemberdayaan masyarakat">Pemberdayaan masyarakat</option>
                                            <option value="Inklusi sosial">Inklusi sosial</option>
                                            <option value="Energi dan lingkungan hidup">Energi dan lingkungan hidup</option>
                                            <option value="Tata kelola pemerintahan">Tata kelola pemerintahan</option>
                                            <option value="Penegakan hukum">Penegakan hukum</option>
                                            <option value="Ketahanan bencana">Ketahanan bencana</option>
                                        </select>
                                        <label for="kategori_inovasi">Kategori Inovasi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <x-ui.text-input id="target_sdgs" name="target_sdgs" type="text" placeholder="Target SDGs" required/>
                                        <label for="target_sdgs">Target SDGs</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <x-ui.text-input id="video_inovasi" name="video_inovasi" type="text" placeholder="youtu.be/abcdefg" required/>
                                        <label for="video_inovasi">Link Video Inovasi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Surat Pernyataan Inovator</label>
                                        <x-ui.text-input id="sp_inovator" name="sp_inovator" type="file" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Surat Pernyataan Kesediaan Replikasi Inovasi</label>
                                        <x-ui.text-input id="sp_replikasi" name="sp_replikasi" type="file" required/>
                                    </div>
                                </div>
                            </div>

                            <hr class="m-0">
                            {{-- <-- Kelompok --> --}}
                            <x-kelompok.umum id="kelompok_umum"/>
                            <x-kelompok.khusus id="kelompok_khusus"/>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
function showCard(selectedValue) {
    // Semua card disembunyikan terlebih dahulu
    document.getElementById("kelompok_umum").style.display = "none";
    document.getElementById("kelompok_khusus").style.display = "none";

    // Hapus atribut required dari semua input di kedua kelompok
    removeRequiredAttributes('kelompok_umum');
    removeRequiredAttributes('kelompok_khusus');

    // Tampilkan card dan tambahkan atribut required sesuai dengan pilihan
    if (selectedValue === "Kelompok Umum") {
        document.getElementById("kelompok_umum").style.display = "block";
        addRequiredAttributes('kelompok_umum');
    } else if (selectedValue === "Kelompok Khusus") {
        document.getElementById("kelompok_khusus").style.display = "block";
        addRequiredAttributes('kelompok_khusus');
    }
}

function addRequiredAttributes(id) {
    // Ambil semua input, textarea di dalam div yang ditampilkan dan tambahkan required
    const inputs = document.querySelectorAll(`#${id} input, #${id} textarea`);
    inputs.forEach(input => {
        input.setAttribute('required', 'required');
    });
}

function removeRequiredAttributes(id) {
    // Ambil semua input, textarea di dalam div yang disembunyikan dan hapus required
    const inputs = document.querySelectorAll(`#${id} input, #${id} textarea`);
    inputs.forEach(input => {
        input.removeAttribute('required');
    });
}

</script>
