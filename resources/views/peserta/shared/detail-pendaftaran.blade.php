<div class="w-full">
    <ul class="list-group">
    
        <li class="list-group-item tw-space-x-3">
            <span>No. Pendaftaran</span>
            <span>:</span>
            <span class="text-primary tw-text-sm sm:tw-text-normal">{{ $user->pendaftaran->no_pendaftaran }}
                <button><i class="bi bi-clipboard"></i></button>
            </span>
        </li>
        <li class="list-group-item tw-space-x-3">
            <span>Tanggal Daftar</span>
            <span>:</span>
            <span>{{ $user->pendaftaran->waktu_daftar }}</span>
        </li>
        <li class="list-group-item tw-space-x-3">
            <span>Jalur Pendaftaran</span>
            <span>:</span>
            <span>
                {{ $user->pendaftaran->jalur_pendaftaran->nama }}
            </span>
        </li>
        <li class="list-group-item tw-space-x-3">
            <span>Status Diterima</span>
            <span>:</span>
            @if ($user->pendaftaran->diterima)
            <span class="badge bg-success border-success">Diterima</span>
            @else
            <span class="badge bg-danger border-danger">Belum Diterima</span>
            @endif
        </li>
        <li class="list-group-item tw-space-x-3">
            <span>Status Verifikasi Formulir</span>
            <span>:</span>
            <span class="badge bg-primary border-primary">{{ $user->pendaftaran->status_verifikasi_formulir }}</span>
        </li>
    </ul>
    
    <div class="card tw-mt-4">
        <div class="card-header tw-flex tw-justify-between tw-items-center">
            <div class="card-title">PERSYARATAN PENDAFTARAN</div>
            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#pendaftaran" aria-expanded="false" aria-controls="pendaftaran">
                Lihat
              </button>
        </div>
        <div class="card-body tw-prose collapse" id='pendaftaran'>
            <ol class="list-group list-group-numbered">
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Bukti Pendaftaran </span><strong>(asli)</strong></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Pernyataan Kebenaran Dokumen/Pakta Integritas (</span><strong>asli,</strong><span style="font-weight: 400;"> sudah diupload)</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Pernyataan Sehat (</span><strong>asli,</strong><span style="font-weight: 400;"> sudah diupload)</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Surat Keterangan Nilai Rapot Semester I - V </span><strong>(asli)</strong><span style="font-weight: 400;">&nbsp;</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">FC Kartu Keluarga (KK)</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">FC Akte Kelahiran</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Surat keterangan lulus (ASLI) </span><span style="font-weight: 400;">atau</span><span style="font-weight: 400;"> FC Ijazah (Lulus sebelum 2023)</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Formulir Biodata Diri yang telah diisi</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Pas Foto 3 x 4, masing-masing 2 lembar, berwarna&nbsp; (bagian belakang diberi nama dan Kompetensi Keahlian)</span></li>
                <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">FC Piagam Prestasi (yang memiliki)</span></li>
            </ol>
        </div>
    </div>
</div>