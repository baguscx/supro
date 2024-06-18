<x-app-layout>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    </style>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Daftar Proposal Inovasi</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body pt-3 mt-1">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul Inovasi</th>
                                    <th>Kelompok</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($proposals->isEmpty())
                                <div class="alert alert-warning" role="alert">
                                    Tidak ada Proposal.
                                </div>
                            @else
                                @foreach($proposals as $proposal)
                                <tr>
                                    <td>
                                        <span class="fw-medium" style="max-width: 200px; word-wrap: break-word; word-break: break-all; white-space: normal;">{{$proposal->judul_inovasi}}</span>
                                    </td>
                                    <td>{{$proposal->kelompok_inovasi}}</td>
                                    <td>{{$proposal->kategori_inovasi}}</td>
                                    <td>
                                        @if($proposal->status == 'draft')
                                            <span class="badge rounded-pill bg-label-info me-1">{{$proposal->status}}</span>
                                        @elseif($proposal->status == 'pending')
                                            <span class="badge rounded-pill bg-label-warning me-1">{{$proposal->status}}</span>
                                        @elseif($proposal->status == 'completed')
                                            <span class="badge rounded-pill bg-label-success me-1">{{$proposal->status}}</span>
                                        @elseif($proposal->status == 'rejected')
                                            <span class="badge rounded-pill bg-label-danger me-1">{{$proposal->status}}</span>
                                        @endif
                                    </>
                                    <td tyle="display: flex;">
                                        @if ($proposal->status == 'completed')
                                            <button style="border: none; margin: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white;"
                                                    onmouseover="this.style.backgroundColor='#45a049';"
                                                    onmouseout="this.style.backgroundColor='#4CAF50';">
                                                    <a style="text-decoration: none; color: #fff;" href="{{route('cetak.surat', $proposal->id)}}"><span class="fas fa-print" style="width: 20px"></span></a>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
