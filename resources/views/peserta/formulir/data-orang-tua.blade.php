<x-app-layout pageTitle="Data orang tua">
    <div class="my-3">
        <div class="dropdown">
            <button class="mb-3 btn btn-primary tw-rounded dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                TAMBAH / PERBAHARUI
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=ayah">Data Ayah</a></li>
                <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=ibu">Data
                        Ibu</a></li>
                <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-orang-tua') }}?type=wali">Data Wali</a></li>
            </ul>
        </div>
     <div class="table-responsive">
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
                    <td>{{ $item->nik ?? '-' }}</td>
                    <td class="gap-1 tw-flex tw-items-center">
                        <a class="btn btn-primary btn-sm tw-text-sm" href="{{ route('peserta.pendaftaran.form.data-orang-tua',['id'=>$item->id]) }}">Ubah</a>
                        <button type="button" data-detail="{{ json_encode($item) }}" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-detail">
                            Detail
                        </button>
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
    </div>
    @push('footer')
    <div class="modal fade" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header tw-flex tw-items-center tw-justify-between">
                    <h1 class="modal-title" id="modal-detailLabel">Detail orang tua</h1>
                    <button type="button"  data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const button = document.querySelectorAll(`button[data-bs-toggle='modal']`);
        button.forEach(element => {
            element.addEventListener('click', function() {
                const target = element.getAttribute('data-bs-target');
                if (target) {
                    const modal = document.querySelector(`${target}`)
                    const body = modal.querySelector('.modal-body')
                    const data = JSON.parse(element.getAttribute('data-detail'));
                        const formattedData = `
                        <p style="margin: 5px 0;"><span style="font-weight: bold;">Nama:</span> ${data.nama ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">NIK:</span> ${data.nik ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">Alamat:</span> ${data.alamat ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">No Telepon:</span> ${data.no_telepon ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">Pekerjaan:</span> ${data.pekerjaan ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">Pendidikan Terakhir:</span> ${data.pendidikan_terakhir ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">Penghasilan:</span> ${data.penghasilan ?? '-'}</p>
                            <p style="margin: 5px 0;"><span style="font-weight: bold;">Sebagai:</span> ${data.type ?? '-'}</p>

                    `;
                    body.innerHTML = formattedData;
                }
            })
        });

    </script>
    @endpush
</x-app-layout>
