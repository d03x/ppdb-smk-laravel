<x-app-layout pageTitle="Data orang tua">
    <div class="my-3">
        <div class="dropdown">
            <button class="mb-3 btn btn-primary tw-rounded-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Isi Data Orang Tua / Wali
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=ayah">Data Ayah</a></li>
              <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=ibu">Data Ibu</a></li>
              <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=wali">Data Wali</a></li>
            </ul>
          </div>
          <table class="table tw-text-sm table-bordered table-primary table-active">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sebagai</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Aksi</th>
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
                    <td width="100px">
                        <a class="btn btn-primary btn-sm" href="{{ route('peserta.pendaftaran.form.data-orang-tua',['id'=>$item->id]) }}">Ubah</a>
                    </td>
                    </tr>
                @endforeach
                    @else
                    <tr>
                        <th colspan="7" class="tw-text-center" scope="row">Silakan Isi Formulir Dulu</th>
                    </tr>
                @endif
               
            </tbody>
        </table>
    </div>
</x-app-layout>
