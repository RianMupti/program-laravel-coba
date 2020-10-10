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
        <div class="col">
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
                    @foreach ($data_barang as $data)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->kode_barang }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>
                            <a href="" class="badge badge-primary">Edit</a>
                            <a href="" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
{{-- <script>alert(123)</script> --}}
@endpush
