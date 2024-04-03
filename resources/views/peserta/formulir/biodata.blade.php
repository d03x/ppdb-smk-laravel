<x-app-layout appTitle='Formulir Pendaftaran'>
   
    <div class="tw-my-3">
        <div class="card tw-rounded-sm tw-shadow tw-border">
            <div class="card-header">
                <a href="{{ route('peserta.pendaftaran.form') }}" class="btn btn-sm btn-primary">Back</a>
            </div>
            <div class="card-body">
                @error('success')
                    <p class="alert alert-success border-success">{{ $message }}</p>
                @enderror
                <form method="POST" action="{{ route('peserta.pendaftaran.form.biodata.simpan') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="foto_peserta" class="form-label">Photo</label>
                        <input accept="image/*" type="file" class="form-control @error('foto_peserta') is-invalid @enderror" id="foto_peserta" name="foto_peserta">
                        @error('foto_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($data['foto_peserta'])
                        <img class="tw-w-[150px] tw-aspect-square tw-rounded border-primary mb-3" src="{{ asset(sprintf('storage/%s',$data['foto_peserta'])) }}" alt="">
                        @else
                        <div class="tw-w-[150px] tw-rounded border-primary tw-text-white tw-aspect-square tw-flex tw-items-center tw-justify-center tw-bg-gray-400 tw-mb-3">
                            <span>Tidak ada foto</span>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="NISN" class="form-label">NISN</label>
                        <input type="text" class="form-control @error('NISN') is-invalid @enderror" id="NISN" name="NISN" value="{{ old('NISN') ?? $data['nisn'] }}">
                        @error('NISN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') ?? $data['nama_lengkap'] }}">
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') ?? $data['nama_panggilan'] }}">
                        @error('nama_panggilan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ (old('jenis_kelamin') ?? $data['jenis_kelamin']) == 'L' ? 'selected' : '' }}>Laki Laki</option>
                            <option value="P" {{ (old('jenis_kelamin') ?? $data['jenis_kelamin']) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $data['tempat_lahir'] }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? now()->parse($data->tanggal_lahir)->format('Y-m-d') }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ old('agama') ?? $data['agama'] }}">
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') ?? $data['alamat'] }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi') ?? $data['provinsi'] }}">
                        @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota') ?? $data['kota'] }}">
                        @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Hp</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') ?? $data['telepon'] }}">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $data['email'] }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn tw-rounded btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>