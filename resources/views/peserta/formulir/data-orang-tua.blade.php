<x-app-layout pageTitle="Data orang tua">
    <div class="my-3">
        <div class="dropdown">
            <button class="mb-3 btn btn-primary tw-rounded dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             TAMBAH / PERBAHARUI
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=ayah">Data Ayah</a></li>
              <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=ibu">Data Ibu</a></li>
              <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=wali">Data Wali</a></li>
            </ul>
          </div>
          <table class="table table-secondary tw-text-sm table-bordered table-striped tw-rounded">
            <thead>
                <tr>
                    <th class="text-white bg-primary" scope="col">#</th>
                    <th class="text-white bg-primary" scope="col">Sebagai</th>
                    <th class="text-white bg-primary" scope="col">Nama</th>
                    <th class="text-white bg-primary" scope="col">NIK</th>
                    <th class="text-white bg-primary" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
               
                @if ($orang_tuas->count() > 0)
                @foreach ($orang_tuas as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ strtoupper( $item->type) }}</td>
                    <td>{{ $item->nama ?? '-' }}</td>
                    <td>{{ $item->nik ?? '-'  }}</td>
                    <td class="gap-1 tw-flex tw-items-center">
                        <a class="btn btn-primary btn-sm tw-text-sm" href="{{ route('peserta.pendaftaran.form.data-orang-tua',['id'=>$item->id]) }}">Ubah</a>
                        <a class="btn btn-success btn-sm tw-text-sm" href="{{ route('peserta.pendaftaran.form.data-orang-tua',['id'=>$item->id]) }}">View</a>
                    </td>
                    </tr>
                @endforeach
                    @else
                    <tr>
                        <th colspan="7" class="tw-text-center tw-text-sm" scope="row">Silakan Isi Formulir Dulu</th>
                    </tr>
                @endif
               
            </tbody>
        </table>
    </div>
</x-app-layout>
