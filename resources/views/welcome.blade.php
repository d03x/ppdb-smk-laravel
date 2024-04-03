<x-app-layout title="Dash">

    @if ($user->pendaftaran?->diterima)
    <p data-title="Status pendaftaran!" data-intro="Status pendaftaran anda akan muncul di sini, jika sudah di terima notifikasi ini akan berubah." class="alert alert-success border-success">
        <i class="bi bi-info-circle"></i>
       <b>Selamat!!</b> Pendaftaran anda sudah di terima dan diverifikasi di jalur {{ $user->pendaftaran->jalur_pendaftaran->nama }}
    </p>
        @else
        <p data-title="Status pendaftaran!" data-intro="Status pendaftaran anda akan muncul di sini, jika sudah di terima notifikasi ini akan berubah." class="alert alert-danger border-danger">
            <i class="bi bi-info-circle"></i>
            Status pendaftaran anda belum di terima! Silahkan ikuti alur pendaftaran nya. jika ada pertanyaan silahkan klik menu bantuan serta cek terus pengumuman
        </p>
    @endif

    <!-- pilih jalur pendaftaran -->

    <div class="gap-3 tw-grid tw-grid-cols-1 sm:tw-grid-cols-2">
        @if ($user->pendaftaran)
        @include('peserta.shared.detail-pendaftaran')
        @else
        <div class="w-full">
            <p data-title="Status pendaftaran!" data-intro="Status pendaftaran anda akan muncul di sini, jika sudah di terima notifikasi ini akan berubah." class="alert tw-text-sm alert-info border-info">
                <i class="bi bi-info-circle"></i>
               Untuk melanjutkan pendaftaran! Silahkan pilih jalur pendaftaran dibawah ini terlebih dahulu.
            </p>
            <div class="table-responsive ">
                <table  data-title="Pilih jalur pendaftaran!" data-intro="Setelah anda mendaftar sekarang pilih jalur pendaftaran terlebih dahulu" class="table table-bordered table-striped tw-border-zinc-400 tw-shadow-sm tw-border">
                    <thead class="tw-text-sm table-primary table-active tw-text-center">
                        <tr>
                            <th rowspan="2">Nama Jalur</th>
                            <th colspan="2">Tanggal</th>
                            <th rowspan="2">Biaya Pendaftaran</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>Mulai</th>
                            <th>Ditutup</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jalur_pendaftaran as $item)
                        <tr class="tw-text-sm">
                            <td>{{$item['nama']}}</td>
                            <td>
                                {{$item['tanggal_dibuka']}}
                            </td>
                            <td>
                                {{$item['tanggal_ditutup']}}
                            </td>
                            <td>
                                Rp.{{ $item['biaya_pendaftaran'] }}
                            </td>
                            <td class="text-center">
                                @if ($item['status'] != false)
                                <div class="badge bg-danger" @disabled(true)>
                                    <i class="bi bi-x-circle"></i>
                                    {{ $item['status'] }}
                                </div>
                                @else
                                <form action="{{ route('peserta.pendaftaran.pilih_jalur') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <input type="text" hidden name="id" value="{{ $item['id'] }}">
                                    <button type="submit" onclick="return confirm('Apakah anda yakin? Tindakan ini tidak bisa di ubah')" class="btn btn-primary btn-sm">
                                        <i class="bi bi-check-circle"></i>
                                        <span>Pilih</span>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
               
            </div>
            <div class="alert tw-text-sm alert-danger border-danger">
                <ol class="list-group list-group-numbered">
                    <li>*) Jadwal bisa berubah sewaktu-waktu.</li>
                    <li>**) Jalur pendaftaran yang sudah di pilih tidak bisa di edit/Diganti.</li>
                    <li> **) Pastikan teliti sebelum memilih jalur pendaftaran.</li>
                </ol>
            </div>
        </div>
        @endif

        <!-- end:pilih-jalur-pendaftaran -->

        <div class="card tw-shadow-sm tw-border" data-title="Timeline pendaftaran!" data-intro="Melacak alur pendaftaran anda, agar lebih mudah">
            <div class="card-body">
                <span class="mb-2 tw-font-semibold tw-block">Alur Pendaftaran</span>
                @include('peserta.shared.timeline-pendaftaran')
            </div>
        </div>
    </div>

</x-app-layout>