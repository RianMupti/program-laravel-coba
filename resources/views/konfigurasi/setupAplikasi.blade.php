@extends('layouts/master')

@section('title', 'Crud')

@section('Saplikasi', 'active')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 shadow">
            @if (sizeof($setup) == 0)

            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            <hr class="mt-2">
            @endif

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Hari Kerja</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setup as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->jumlah_hari_kerja }}</td>
                        <td>
                            <a href="{{ route('crud.edit', [$data->id]) }}" class="badge badge-success">Edit</a>
                            {{-- <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                            <form action="{{ route('crud.hapus', [$data->id]) }}" id="delete{{ $data->id }}"
                                method="POST">
                                @csrf
                                @method('delete')
                            </form>
                            Delete
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $data_barang->links() }} --}}
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('setup.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_aplikasi">Nama Aplikas</label>
                                <input type="text" name="nama_aplikasi" value="{{ old('nama_aplikasi') }}"
                                    class="form-control @error('nama_aplikasi') is-invalid @enderror">
                                @error('nama_aplikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hari Kerja</label>
                                <input type="number" name="jumlah_hari_kerja" value="{{ old('jumlah_hari_kerja') }}"
                                    class="form-control @error('jumlah_hari_kerja') is-invalid @enderror">
                                @error('jumlah_hari_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('page-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-script')
<script>
    $(".swal-confirm").click(function (e) {
        id = e.target.dataset.id;
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                    $(`#delete${id}`).submit();
                }
                //  else {
                //     swal("Your imaginary file is safe!");
                // }
            });
    });

</script>
@endpush
