<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-9">
                    <div class="card mb-4">
                        <div class="card-body pt-2 mt-1">
                            <iframe src="http://supro.test/cetak/{{$proposal->id}}" style="width:100%; height:600px;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>

                @if ($proposal->status == 'pending' && Auth::user()->hasRole('staff'))
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body pt-2 mt-1">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <button data-toggle="modal" data-target="#passwordModal" class="btn btn-primary btn-block mb-2">Tanda Tangani</button>
                                    <form style="padding:0;" action="{{route('tolak.proposal', $proposal->id)}}" method="post">
                                        @csrf
                                        <button style="width:100%" class="btn btn-danger btn-block">Tolak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Masukkan Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('ttd.proposal', $proposal->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="passwordInput">Password</label>
                                        <input name="ttd" type="password" class="form-control" id="passwordInput" placeholder="Masukkan password">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                </form>
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
