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