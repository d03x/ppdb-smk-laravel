<x-app-layout pageTitle="Ubah Rapot">
    <div class="card">
        <div class="card-body">
            <p class="alert alert-secondary">
                Update nilai matpel {{ $data->matpel->nama }} Semester {{ $data->semester->nama }}
            </p>
            <form action="{{ route('peserta.pendaftaran.form.data-nilai-rapot.nilai.simpan_nilai',['rapot_id'=>$data->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nilai" class="form-label">NILAI</label>
                    <input name="nilai" type="text" class="form-control" value="{{ old('nilai',$data->nilai) }}">
                </div>
                <button class="mt-2 btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</x-app-layout>