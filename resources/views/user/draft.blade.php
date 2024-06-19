<x-app-layout>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    </style>
    <x-slot name="title">
        Proposal Inovasi
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Proposal Inovasi</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body pt-3 mt-1">
                            <button type="button" class="btn btn-primary mb-3" onclick="window.location.href = '{{route('create.proposal')}}'">Buat Baru</button>
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
                                    Tidak ada draft.
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
                                        @elseif($proposal->status == 'revision')
                                            <span class="badge rounded-pill bg-label-primary me-1">{{$proposal->status}}</span>
                                        @endif
                                    </td>
                                    <td style="display: flex; gap:5px;">
                                        @if ($proposal->status == 'draft')
                                            <form action="{{route('send.proposal', $proposal->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{$proposal->id}}">
                                                <button onclick="return confirm('Anda yakin ingin mengirim proposal ini?');"" type="submit" style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #2196F3; color: white;"
                                                        onmouseover="this.style.backgroundColor='#1E88E5';"
                                                        onmouseout="this.style.backgroundColor='#2196F3';">
                                                    <a style="text-decoration: none; color: #fff;" href=""><span class="fas fa-paper-plane" style="width: 20px"></span> </a>
                                                </button>
                                            </form>
                                                <button style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white;"
                                                        onmouseover="this.style.backgroundColor='#45a049';"
                                                        onmouseout="this.style.backgroundColor='#4CAF50';">
                                                    <a style="text-decoration: none; color: #fff;" href="{{route('edit.proposal', $proposal->id)}}"><span class="fas fa-edit" style="width: 20px"></span> </a>
                                                </button>
                                            <form action="{{route('delete.proposal', $proposal->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$proposal->id}}">
                                                <button onclick="return confirm('Anda yakin ingin menghapus proposal ini?');" style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #f44336; color: white;"
                                                        onmouseover="this.style.backgroundColor='#e53935';"
                                                        onmouseout="this.style.backgroundColor='#f44336';">
                                                    <a style="text-decoration: none; color: #fff;" href=""><span class="fas fa-trash" style="width: 20px"></span> </a>
                                                </button>
                                            </form>
                                        @elseif ($proposal->status == 'pending')

                                        @elseif ($proposal->status == 'completed')
                                            <button style="border: none; margin: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white;"
                                                    onmouseover="this.style.backgroundColor='#45a049';"
                                                    onmouseout="this.style.backgroundColor='#4CAF50';">
                                                    <a style="text-decoration: none; color: #fff;" href="{{route('cetak.surat', $proposal->id)}}"><span class="fas fa-print" style="width: 20px"></span></a>
                                            </button>
                                        @elseif ($proposal->status == 'rejected')
                                            <button style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #f44336; color: white;"
                                                    onmouseover="this.style.backgroundColor='#e53935';"
                                                    onmouseout="this.style.backgroundColor='#f44336';">
                                                    <a style="text-decoration: none; color: #fff;" href="{{route('edit.proposal', $proposal->id)}}"><span class="fas fa-edit" style="width: 20px"></span></a>
                                            </button>
                                        @elseif ($proposal->status == 'revision')
                                           <button data-toggle="modal" data-target="#noteModal" style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #FFA500; color: white;"
                                                    onmouseover="this.style.backgroundColor='#FF8C00';"
                                                    onmouseout="this.style.backgroundColor='#FFA500';">
                                                    <a style="text-decoration: none; color: #fff;" ><span class="fa-solid fa-circle-info" style="width: 20px"></span></a>
                                            </button>

                                            <button style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white;"
                                                    onmouseover="this.style.backgroundColor='#45a049';"
                                                    onmouseout="this.style.backgroundColor='#4CAF50';">
                                                <a style="text-decoration: none; color: #fff;" href="{{route('edit.proposal', $proposal->id)}}"><span class="fas fa-edit" style="width: 20px"></span> </a>
                                            </button>
                                        @endif
                                    </td>
                                </tr>

                                {{-- catatan --}}
                                <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="passwordModalLabel">Catatan Revisi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{$proposal->note ?? ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- catatan --}}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>
