@extends('layouts/master')

@section('title', 'Crud')

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
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('crud.tambah') }}" class="btn btn-icon icon-left btn-primary"><i
                    class="far fa-edit"></i>Tambah Data</a>
            <hr>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_barang as $no => $data)
                    <tr>
                        <th scope="row">{{ $data_barang->firstItem()+$no }}</th>
                        <td>{{ $data->kode_barang }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>
                            <a href="{{ route('crud.edit', [$data->id]) }}" class="badge badge-success">Edit</a>
                        <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                        <form action="{{ route('crud.hapus', [$data->id]) }}" id="delete{{ $data->id }}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data_barang->links() }}
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
