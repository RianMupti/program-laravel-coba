@extends('layouts/master')

@section('title', 'Tambah')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title text-dark">Form Tambah Data</h4>
                    {{-- <div class="alert alert-info">
                        <b>Note!</b> Not all browsers support HTML5 type input.
                    </div> --}}
                    <form action="{{ route('crud.simpan') }}" id="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" class="form-control @error('kode_barang') is-invalid @enderror">
                                    @error('kode_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control @error('nama_barang') is-invalid @enderror">
                                    @error('nama_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset" >Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
{{-- <script>alert(123)</script> --}}
@endpush

@push('after-script')
    
@endpush
