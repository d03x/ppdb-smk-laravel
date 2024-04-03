<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
    <div class="vertical-timeline-item vertical-timeline-element">
        <div>
            <span class="vertical-timeline-element-icon bounce-in">
                <i class="badge badge-dot badge-dot-xl {{ $user->pendaftaran ? 'bg-success' : 'bg-danger' }}"> </i>
            </span>
            <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title tw-text-sm">PIIH JALUR PENDAFARAN
                    @if (!$user->pendaftaran)
                    <p class="text-danger tw-text-xs tw-capitalize tw-font-normal">
                        <i class="bi bi-x-circle"></i>
                        Jalur pendaftaran belum di pilih
                    </p>
                    @else
                    <p class="text-primary tw-text-xs tw-capitalize tw-font-normal">
                        <i class="bi bi-check-circle"></i>
                        Sudah di pilih ({{ $user->pendaftaran->jalur_pendaftaran->nama }})
                    </p>
                    @endif
                </h4>

            </div>
        </div>
    </div>

    <div class="vertical-timeline-item vertical-timeline-element">
        <div>
            <span class="vertical-timeline-element-icon bounce-in">
                <i class="badge badge-dot badge-dot-xl bg-warning"> </i>
            </span>
            <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title tw-text-sm">FORMULIR PENDAFTARAN
                    <p class="text-danger tw-text-xs tw-capitalize tw-font-normal">
                        <i class="bi bi-x-circle"></i>
                        Belum lengkapi! Lengkapi sekarang
                    </p>
                </h4>
                <ul data-title="Status pendaftaran!" data-intro="Formulir yang harus di isi."
                    class="list-group tw-rounded-none tw-mb-3 list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Biodata Peserta
                        </div>
                        @if ($user->pendaftaran?->biodata)
                        <span class="text-primary">
                            <i class="bi bi-check-circle"></i>
                        </span>
                        @else
                        <span class="text-danger">
                            <i class="bi bi-x-circle"></i>
                        </span>
                        @endif
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Data orang tua
                        </div>
                        <span class="text-danger">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Data prestasi
                        </div>
                        <span class="text-primary">
                            <i class="bi bi-check-circle"></i>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Data Nilai Rapot
                        </div>
                        <span class="text-danger">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            Data Sekolah asal
                        </div>
                        <span class="text-danger">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </li>
                </ul>
                <a href="{{ route('peserta.pendaftaran.form') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                    <span>Lengkapi Sekarang</span>
                </a>
            </div>
        </div>
    </div>

    <div class="vertical-timeline-item vertical-timeline-element">
        <div>
            <span class="vertical-timeline-element-icon bounce-in">
                <i class="badge badge-dot badge-dot-xl bg-danger"> </i>
            </span>
            <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title tw-text-sm">UPLOAD BERKAS</h4>
                <p class="text-danger">
                    <i class="bi bi-x-circle"></i>
                    Belum melakukan upload berkas! Lengkapi formulir pendaftaran terlebih dahulu
                </p>
            </div>
        </div>
    </div>
    <div class="vertical-timeline-item vertical-timeline-element">
        <div>
            <span class="vertical-timeline-element-icon bounce-in">
                <i class="badge badge-dot badge-dot-xl bg-danger"> </i>
            </span>
            <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title tw-text-sm">TES & WAWANCARA</h4>
                <p class="text-danger">
                    <i class="bi bi-x-circle"></i>
                    Belum melakukan test dan wawancara
                </p>
            </div>
        </div>
    </div>
    <div class="vertical-timeline-item vertical-timeline-element">
        <div>
            <span class="vertical-timeline-element-icon bounce-in">
                <i class="badge badge-dot badge-dot-xl bg-danger"> </i>
            </span>
            <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title tw-text-sm">Daftar ulang</h4>
                <p class="text-danger">
                    <i class="bi bi-x-circle"></i>
                    Belum melakukan daftar ulang
                </p>
            </div>
        </div>
    </div>
    <div class="vertical-timeline-item vertical-timeline-element">
        <div>
            <span class="vertical-timeline-element-icon bounce-in">
                <i class="badge badge-dot badge-dot-xl bg-primary"> </i>
            </span>
            <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title tw-text-sm">Diterima</h4>
                <p class="text-primary">
                    <i class="bi bi-check-circle"></i>
                    Selama Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque rerum ex quae ut molestiae!
                    Quasi numquam, repellat, fuga commodi corrupti qui eveniet rerum dolores cum aspernatur quae
                    excepturi? Porro, blanditiis.
                </p>
            </div>
        </div>
    </div>
</div>