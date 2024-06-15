<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Daftar Proposal Inovasi</h4>
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
                                        @endif
                                    </>
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item waves-effect" href="{{route('show.proposal', $proposal->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Show</a>
                                            <a class="dropdown-item waves-effect" href="{{route('cetak.surat', $proposal->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Print</a>
                                            {{-- <a class="dropdown-item waves-effect" href="{{route('edit.proposal', $proposal->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a> --}}
                                            {{-- <form action="{{route('delete.proposal', $proposal->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$proposal->id}}">
                                                <button type="submit" class="dropdown-item waves-effect" href="javascript:void(0);" onclick="return confirm('apa anda yakin?')"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                                            </form> --}}
                                        </div>
                                        </div>
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
