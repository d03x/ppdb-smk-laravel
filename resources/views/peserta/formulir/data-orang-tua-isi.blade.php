<x-app-layout pageTitle="Ubah Data Orang Tua">
   <div class="card card-body">
    <div class="w-full">
      <form  method="POST" action="{{ route('peserta.pendaftaran.form.data-orang-tua.simpan',$data->id) }}"> 
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="nama" class="form-label tw-capitalize">Nama {{ $data->type }}</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama',$data->nama)  }}">
            @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="nik" class="form-label tw-capitalize">NIK {{ $data->type }}</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik',$data->nik) }}">
            @error('nik')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="pekerjaan" class="form-label tw-capitalize">Pekerjaan {{ $data->type }}</label>
            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan',$data->pekerjaan) }}">
            @error('pekerjaan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="penghasilan" class="form-label tw-capitalize">Penghasilan {{ $data->type }}</label>
            <input type="number" class="form-control @error('penghasilan') is-invalid @enderror" id="penghasilan" name="penghasilan" value="{{ old('penghasilan',$data->penghasilan) }}">
            @error('penghasilan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="pendidikan_terakhir" class="form-label tw-capitalize">Pendidikan Terakhir {{ $data->type }}</label>
            <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir',$data->pendidikan_terakhir) }}">
            @error('pendidikan_terakhir')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="alamat" class="form-label tw-capitalize">Alamat {{ $data->type }}</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat',$data->alamat) }}</textarea>
            @error('alamat')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <div class="mb-3">
            <label for="no_telepon" class="form-label tw-capitalize">Nomor Telepon {{ $data->type }}</label>
            <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon',$data->no_telepon) }}">
            @error('no_telepon')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
      
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
  </div>
   </div>
</x-app-layout>