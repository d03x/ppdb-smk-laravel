<x-app-layout pageTitle="Prestasi">
  <a class="btn btn-sm btn-primary mb-2" href="{{ route('peserta.pendaftaran.form.data-prestasi') }}">Tambah Baru</a>
   <div class="table-responsive">
    <table class="table table-bordered table-secondary table-striped-columns">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kegiatan</th>
                <th>Jenis</th>
                <th>Tingkat</th>
                <th>Tahun</th>
                <th>Pencapaian</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @if ($data->count() > 0)
                @foreach ($data as $item)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kegiatan ?? '-'}}</td>
                    <td>{{ $item->jenis ?? '-'}}</td>
                    <td>{{ $item->tingkat ?? '-'}}</td>
                    <td>{{ $item->tahun ?? '-'}}</td>
                    <td>{{ $item->pencapaian ?? '-'}}</td>
                    <td>
                        <a href="{{ route('peserta.pendaftaran.form.data-prestasi',[
                            'id' => $item->id
                        ]) }}" class="btn btn-warning btn-sm text-white">Update</a>
                        <a href="{{ route('peserta.pendaftaran.form.data-prestasi',[
                            'id' => $item->id
                        ]) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td rowspan="6" scope="row"></td>
                   
                </tr>
            @endif
           
        </tbody>
    </table>
   </div>
    
</x-app-layout>