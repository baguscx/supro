<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Proposal Inovasi</h4>

        @if($proposal->status == "draft")
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body pt-2 mt-1">
                            <form id="formAccountSettings" method="POST" action="{{route('update.proposal', $proposal->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mt-2 gy-4">
                                    <div class="col-md-12">
                                        <small>Isian Umum</small>
                                        <div class="mt-3 form-floating form-floating-outline">
                                            <x-ui.text-input id="judul_inovasi" name="judul_inovasi" type="text" value="{{$proposal->judul_inovasi}}" placeholder="Judul Inovasi" disabled/>
                                            <label for="judul_inovasi">Judul Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <x-ui.text-input id="waktu_implementasi" name="waktu_implementasi" value="{{$proposal->waktu_implementasi}}" type="date" disabled/>
                                            <label for="waktu_implementasi">Waktu Implemantasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="kelompok_inovasi" name="kelompok_inovasi" class="form-select form-select-lg" disabled>
                                                <option>----------------Kelompok Inovasi----------------</option>
                                                <option value="Kelompok Umum" {{$proposal->kelompok_inovasi == "Kelompok Umum" ? 'selected' : ''}}>Kelompok Umum</option>
                                                <option value="Kelompok Khusus" {{$proposal->kelompok_inovasi == "Kelompok Khusus" ? 'selected' : ''}}>Kelompok Khusus</option>
                                            </select>
                                            <label for="kelompok_inovasi">Kelompok Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="kategori_inovasi" name="kategori_inovasi" class="form-select form-select-lg" disabled>
                                                <option>----------------Kategori Inovasi----------------</option>
                                                <option value="Kesehatan" {{$proposal->kategori_inovasi == "Kesehatan" ? 'selected' : ''}}>Kesehatan</option>
                                                <option value="Pendidikan" {{$proposal->kategori_inovasi == "Pendidikan" ? 'selected' : ''}}>Pendidikan</option>
                                                <option value="Pertumbuhan ekonomi dan kesempatan kerja" {{$proposal->kategori_inovasi == "Pertumbuhan ekonomi dan kesempatan kerjaa" ? 'selected' : ''}}>Pertumbuhan ekonomi dan kesempatan kerja</option>
                                                <option value="Pengentasan kemiskinan" {{$proposal->kategori_inovasi == "Pengentasan kemiskinan" ? 'selected' : ''}}>Pengentasan kemiskinan</option>
                                                <option value="Ketahanan pangan" {{$proposal->kategori_inovasi == "Ketahanan pangan" ? 'selected' : ''}}>Ketahanan pangan</option>
                                                <option value="Pemberdayaan masyarakat" {{$proposal->kategori_inovasi == "Pemberdayaan masyarakat" ? 'selected' : ''}}>Pemberdayaan masyarakat</option>
                                                <option value="Inklusi sosial" {{$proposal->kategori_inovasi == "Inklusi sosial" ? 'selected' : ''}}>Inklusi sosial</option>
                                                <option value="Energi dan lingkungan hidup" {{$proposal->kategori_inovasi == "Energi dan lingkungan hidup" ? 'selected' : ''}}>Energi dan lingkungan hidup</option>
                                                <option value="Tata kelola pemerintahan" {{$proposal->kategori_inovasi == "Tata kelola pemerintahan" ? 'selected' : ''}}>Tata kelola pemerintahan</option>
                                                <option value="Penegakan hukum" {{$proposal->kategori_inovasi == "Penegakan hukum" ? 'selected' : ''}}>Penegakan hukum</option>
                                                <option value="Ketahanan bencana" {{$proposal->kategori_inovasi == "Ketahanan bencana" ? 'selected' : ''}}>Ketahanan bencana</option>
                                            </select>
                                            <label for="kategori_inovasi">Kelompok Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <x-ui.text-input id="target_sdgs" name="target_sdgs" type="text" value="{{$proposal->target_sdgs}}" placeholder="Target SDGs" disabled/>
                                            <label for="target_sdgs">Target SDGs</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <x-ui.text-input id="video_inovasi" name="video_inovasi" type="text" value="{{$proposal->video_inovasi}}" placeholder="youtu.be/abcdefg" disabled/>
                                            <label for="video_inovasi">Link Video Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Surat Pernyataan Inovator [<a href="{{route('dinovator', $proposal->id)}}">Download File</a>]</label>
                                            <x-ui.text-input id="sp_inovator" name="sp_inovator" type="file" disabled/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Surat Pernyataan Kesediaan Replikasi Inovasi [<a href="{{route('dinovasi', $proposal->id)}}">Download File</a>]</label>
                                            <x-ui.text-input id="sp_replikasi" name="sp_replikasi" type="file" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <hr class="m-0">
                                {{-- <-- Kelompok --> --}}
                                @if($proposal->kelompok_inovasi == "Kelompok Umum")
                                    <x-kelompok.view_umum style="display: block" id="kelompok_umum" :proposal="$proposal"/>
                                @elseif($proposal->kelompok_inovasi == "Kelompok Khusus")
                                    <x-kelompok.view_khusus style="display: block" id="kelompok_khusus" :proposal="$proposal"/>
                                @else
                                    Tidak ada kelompok
                                @endif

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($proposal->status == "pending" || $proposal->status == "completed")
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body pt-2 mt-1">
                            <form id="formAccountSettings" method="POST" action="{{route('update.proposal', $proposal->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mt-2 gy-4">
                                    <div class="col-md-12">
                                        <small>Isian Umum</small>
                                        <div class="mt-3 form-floating form-floating-outline">
                                            <x-ui.text-input id="judul_inovasi" name="judul_inovasi" type="text" value="{{$proposal->judul_inovasi}}" placeholder="Judul Inovasi" disabled/>
                                            <label for="judul_inovasi">Judul Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <x-ui.text-input id="waktu_implementasi" name="waktu_implementasi" value="{{$proposal->waktu_implementasi}}" type="date" disabled/>
                                            <label for="waktu_implementasi">Waktu Implemantasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="kelompok_inovasi" name="kelompok_inovasi" class="form-select form-select-lg" disabled>
                                                <option>----------------Kelompok Inovasi----------------</option>
                                                <option value="Kelompok Umum" {{$proposal->kelompok_inovasi == "Kelompok Umum" ? 'selected' : ''}}>Kelompok Umum</option>
                                                <option value="Kelompok Khusus" {{$proposal->kelompok_inovasi == "Kelompok Khusus" ? 'selected' : ''}}>Kelompok Khusus</option>
                                            </select>
                                            <label for="kelompok_inovasi">Kelompok Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <select id="kategori_inovasi" name="kategori_inovasi" class="form-select form-select-lg" disabled>
                                                <option>----------------Kategori Inovasi----------------</option>
                                                <option value="Kesehatan" {{$proposal->kategori_inovasi == "Kesehatan" ? 'selected' : ''}}>Kesehatan</option>
                                                <option value="Pendidikan" {{$proposal->kategori_inovasi == "Pendidikan" ? 'selected' : ''}}>Pendidikan</option>
                                                <option value="Pertumbuhan ekonomi dan kesempatan kerja" {{$proposal->kategori_inovasi == "Pertumbuhan ekonomi dan kesempatan kerjaa" ? 'selected' : ''}}>Pertumbuhan ekonomi dan kesempatan kerja</option>
                                                <option value="Pengentasan kemiskinan" {{$proposal->kategori_inovasi == "Pengentasan kemiskinan" ? 'selected' : ''}}>Pengentasan kemiskinan</option>
                                                <option value="Ketahanan pangan" {{$proposal->kategori_inovasi == "Ketahanan pangan" ? 'selected' : ''}}>Ketahanan pangan</option>
                                                <option value="Pemberdayaan masyarakat" {{$proposal->kategori_inovasi == "Pemberdayaan masyarakat" ? 'selected' : ''}}>Pemberdayaan masyarakat</option>
                                                <option value="Inklusi sosial" {{$proposal->kategori_inovasi == "Inklusi sosial" ? 'selected' : ''}}>Inklusi sosial</option>
                                                <option value="Energi dan lingkungan hidup" {{$proposal->kategori_inovasi == "Energi dan lingkungan hidup" ? 'selected' : ''}}>Energi dan lingkungan hidup</option>
                                                <option value="Tata kelola pemerintahan" {{$proposal->kategori_inovasi == "Tata kelola pemerintahan" ? 'selected' : ''}}>Tata kelola pemerintahan</option>
                                                <option value="Penegakan hukum" {{$proposal->kategori_inovasi == "Penegakan hukum" ? 'selected' : ''}}>Penegakan hukum</option>
                                                <option value="Ketahanan bencana" {{$proposal->kategori_inovasi == "Ketahanan bencana" ? 'selected' : ''}}>Ketahanan bencana</option>
                                            </select>
                                            <label for="kategori_inovasi">Kelompok Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <x-ui.text-input id="target_sdgs" name="target_sdgs" type="text" value="{{$proposal->target_sdgs}}" placeholder="Target SDGs" disabled/>
                                            <label for="target_sdgs">Target SDGs</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <x-ui.text-input id="video_inovasi" name="video_inovasi" type="text" value="{{$proposal->video_inovasi}}" placeholder="youtu.be/abcdefg" disabled/>
                                            <label for="video_inovasi">Link Video Inovasi</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Surat Pernyataan Inovator [<a href="{{route('dinovator', $proposal->id)}}">Download File</a>]</label>
                                            <x-ui.text-input id="sp_inovator" name="sp_inovator" type="file" disabled/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Surat Pernyataan Kesediaan Replikasi Inovasi [<a href="{{route('dinovasi', $proposal->id)}}">Download File</a>]</label>
                                            <x-ui.text-input id="sp_replikasi" name="sp_replikasi" type="file" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <hr class="m-0">
                                {{-- <-- Kelompok --> --}}
                                @if($proposal->kelompok_inovasi == "Kelompok Umum")
                                    <x-kelompok.view_umum style="display: block" id="kelompok_umum" :proposal="$proposal"/>
                                @elseif($proposal->kelompok_inovasi == "Kelompok Khusus")
                                    <x-kelompok.view_khusus style="display: block" id="kelompok_khusus" :proposal="$proposal"/>
                                @else
                                    Tidak ada kelompok
                                @endif
{{--
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
