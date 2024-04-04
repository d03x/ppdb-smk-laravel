<x-app-layout appTitle="Formulir">
    <div class="w-full">
        <ul data-title="Status pendaftaran!" data-intro="Formulir yang harus di isi." class="list-group tw-rounded-none tw-mb-3 tw-mt-4 list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    Biodata Peserta

                </div>
                @if (!$user->pendaftaran?->biodata)
                <a href="{{ route('peserta.pendaftaran.form.biodata') }}" class="btn btn-primary btn-sm">Isi Formulir</a>
                @else
                <a href="{{ route('peserta.pendaftaran.form.biodata') }}" class="btn btn-primary btn-sm">Perbaharui</a>
                @endif

            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    Data orang tua
                </div>
                @if ($status_data_orang_tua)
                <a href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}" class="btn btn-primary btn-sm">Perbaharui</a>
                @else
                <a href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}" class="btn btn-primary btn-sm">Isi Formulir</a>
                @endif
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    Data prestasi
                </div>
                <a href="{{ route('peserta.pendaftaran.form.data-prestasi.lists') }}" class="btn btn-primary btn-sm">Isi Formulir</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    Data Nilai Rapot
                </div>
                <a href="{{ route('peserta.pendaftaran.form.data-prestasi') }}" class="btn btn-primary btn-sm">Isi Formulir</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    Data Sekolah asal

                </div>
                <a href="" class="btn btn-primary btn-sm">Isi Formulir</a>

            </li>
        </ul>
        <button class="btn btn-primary">Cetak Formulir</button>
    </div>
</x-app-layout>
