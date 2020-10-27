<div class="row">
    <div class="col-md-6">
    <input type="hidden" value="{{ $setup->id }}" name="id" id="id_data">
        <div class="form-group">
            <label for="nama_aplikasi">Nama Aplikasi</label>
            <input type="text" name="nama_aplikasi" value="{{ $setup->nama_aplikasi }}"
                class="form-control ">
                <div class="invalid-feedback">
                </div>
            
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Jumlah Hari Kerja</label>
            <input type="text" name="jumlah_hari_kerja" value="{{ $setup->jumlah_hari_kerja }}"
                class="form-control">
            <div class="invalid-feedback Jkerja"></div>
            {{-- <div class="valid-feedback"></div> --}}
        </div>
    </div>
</div>