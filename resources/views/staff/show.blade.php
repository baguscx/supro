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
                                    <button onclick="showCard()" name="revisi" id="revisi" class="btn btn-info btn-block mb-2">Revisi</button>
                                    <form style="display: none;" name="revisi-form" id="revisi-form" action="{{route('revisi.proposal', $proposal->id)}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="note" class="form-control mb-1" id="noteInput" cols="30" rows="10" placeholder="Masukkan Catatan"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-success mb-2" >Kirim</button>
                                        </div>
                                    </form>
                                    <button data-toggle="modal" data-target="#noteModal" class="btn btn-danger btn-block mb-2">Tolak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- password --}}
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
                {{-- password --}}

                {{-- catatan --}}
                <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Catatan Tolak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('tolak.proposal', $proposal->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="note" class="form-control" id="noteInput" cols="30" rows="10" placeholder="Masukkan Catatan"></textarea>                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- catatan --}}

            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function showCard() {
        var revisiForm = document.getElementById("revisi-form");
        var revisiButton = document.getElementById("revisi");

        // Toggle the display of the revisi-form
        revisiForm.style.display = revisiForm.style.display === "none" ? "block" : "none";

        // Change the text of the revisi button based on the form's display
        revisiButton.innerText = revisiForm.style.display === "none" ? "Revisi" : "Batal";
    }
</script>

</x-app-layout>
