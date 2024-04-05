<x-app-layout pageTitle="Tambah Prestasi">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a href="{{ route('peserta.pendaftaran.form.data-prestasi.lists') }}" onclick="return confirm('Apakah anda yakin? Perubahan tidak akan di simpan')" class="btn btn-primary">back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('peserta.pendaftaran.form.data-prestasi.simpan',['id'=>$data->id]) }}" method="POST">
                @csrf
                @method('put')
                <!-- Nama Kegiatan -->
                <div class="mb-1 form-group">
                    <label class="form-label" for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan',$data->nama_kegiatan) }}">
                    @error('nama_kegiatan')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Jenis -->
                <div class="mb-1 form-group">
                    <label class="form-label" for="jenis">Jenis</label>
                    <select class="form-control" id="jenis" name="jenis">
                        <option value="individual" {{ old('jenis',$data->jenis) == 'individual' ? 'selected' : '' }}>Individual</option>
                        <option value="kelompok" {{ old('jenis',$data->jenis) == 'kelompok' ? 'selected' : '' }}>Kelompok</option>
                    </select>
                    @error('jenis')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Tingkat -->
                <div class="mb-1 form-group">
                    <label class="form-label" for="tingkat">Tingkat</label>
                    <select class="form-control" id="tingkat" name="tingkat">
                        <option value="" {{ old('tingkat',$data->tingkat) == '' ? 'selected' : '' }}>Pilih Tingkat</option>
                        <option value="Kabupaten" {{ old('tingkat',$data->tingkat) == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                        <option value="Provinsi" {{ old('tingkat',$data->tingkat) == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="Nasional" {{ old('tingkat',$data->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                        <option value="Internasional" {{ old('tingkat',$data->tingkat) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        <option value="Sekolah" {{ old('tingkat',$data->tingkat) == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                        <option value="Sekolah" {{ old('tingkat',$data->tingkat) == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                        <option value="Wilayah" {{ old('tingkat',$data->tingkat) == 'Wilayah' ? 'selected' : '' }}>Wilayah</option>
                        <option value="Organisasi" {{ old('tingkat',$data->tingkat) == 'Organisasi' ? 'selected' : '' }}>Organisasi</option>
                        <option value="Kompetisi" {{ old('tingkat',$data->tingkat) == 'Kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                        <option value="Profesional" {{ old('tingkat',$data->tingkat) == 'Profesional' ? 'selected' : '' }}>Profesional</option>
                    </select>
                    @error('tingkat')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Tahun -->
                <div class="mb-1 form-group">
                    <label class="form-label" for="tahun">Tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun',$data->tahun) }}">
                    @error('tahun')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Pencapaian -->
                <div class="mb-1 form-group">
                    <label class="form-label" for="pencapaian">Pencapaian</label>
                    <select class="form-control" id="pencapaian" name="pencapaian">
                        <option value="" {{ old('pencapaian',$data->pencapaian) == '' ? 'selected' : '' }}>Pilih Pencapaian</option>
                        <option value="Juara 1" {{ old('pencapaian',$data->pencapaian) == 'Juara 1' ? 'selected' : '' }}>Juara 1</option>
                        <option value="Juara 2" {{ old('pencapaian',$data->pencapaian) == 'Juara 2' ? 'selected' : '' }}>Juara 2</option>
                        <option value="Juara 3" {{ old('pencapaian',$data->pencapaian) == 'Juara 3' ? 'selected' : '' }}>Juara 3</option>
                    </select>
    
                    @error('pencapaian')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    
            </form>
        </div>
       
    </div>
</x-app-layout>
