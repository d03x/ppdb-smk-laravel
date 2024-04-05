<x-app-layout pageTitle="Prestasi">
    <a class="tw-p-2 tw-inline-block tw-text-normal tw-rounded tw-mb-3 tw-text-white tw-bg-brand hover:tw-bg-brand/80 tw-transition-all" href="{{ route('peserta.pendaftaran.form.data-prestasi') }}">
    <i class="bi bi-plus-circle"></i>
    Tambah Baru
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-secondary table-striped">
            <thead>
                <tr>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">#</th>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">Nama Kegiatan</th>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">Jenis</th>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">Tingkat</th>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">Tahun</th>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">Pencapaian</th>
                    <th class="text-white bg-gradient tw-font-normal" style="background: #003366">Actions</th>
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
                        ]) }}" class="text-white btn btn-warning btn-sm">Update</a>
                        <a href='{{ route('peserta.pendaftaran.form.data-prestasi.delete',['id' => $item->id]) }}' data-confirm-delete="true" class="text-white btn btn-danger btn-sm">Hapus</a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="tw-text-center tw-text-sm" scope="row">BELUM ADA DATA</td>

                </tr>
                @endif

            </tbody>
        </table>
    </div>

</x-app-layout>
