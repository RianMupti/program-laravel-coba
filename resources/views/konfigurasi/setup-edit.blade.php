<div class="row">
    <div class="col-md-6">
    <input type="hidden" value="{{ $setup->id }}" name="id" id="id_data">
        <div class="form-group">
            <label for="nama_aplikasi">Nama Aplikasi</label>
            <input type="text" name="nama_aplikasi" value="{{ $setup->nama_aplikasi }}"
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
            <input type="number" name="jumlah_hari_kerja" value="{{ $setup->jumlah_hari_kerja }}"
                class="form-control @error('jumlah_hari_kerja') is-invalid @enderror">
            @error('jumlah_hari_kerja')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>