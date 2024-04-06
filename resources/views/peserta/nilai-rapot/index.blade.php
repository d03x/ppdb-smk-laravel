<x-app-layout pageTitle="Nilai Rapot">
    <div class="table-responsive tw-text-sm">
        <table class="table tw-w-[1200px] table-striped table-secondary text-center table-bordered table-hover">
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">Aksi</th>
                    <th rowspan="2">Semester</th>
                    <th colspan="{{ $matpel->count() }}">NILAI</th>
                    <th rowspan="2">Rata Rata</th>
                </tr>
                <tr>
                    @foreach ($matpel as $item)
                    <th>{{ $item->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                    $totalSemuaSemester = 0;
                @endphp
                @foreach ($data as $keyw => $item)
                @php
                $totalNilaiSemester = 0;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <button class="mb-3 btn-sm btn btn-primary tw-rounded dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            UBAH
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($matpel as $item1)
                            <li><a class="dropdown-item" href="{{ route('peserta.pendaftaran.form.data-nilai-rapot.nilai.ubah',['matpel_id'=>$item1->id,'semester_id'=>$keyw]) }}">{{ $item1->nama }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>Semester {{ $keyw }}</td>
                    @foreach ($item as $itemval)
                    @if (is_array($itemval))
                    <td>{{ $itemval['nilai'] }}</td>
                    @php
                    $totalNilaiSemester += (int)$itemval['nilai'];
                    @endphp
                    @else
                    <td>-</td>
                    @endif
                    @endforeach
                    <td>
                        @php
                            $total = $totalNilaiSemester / $matpel->count();
                            $totalSemuaSemester += $total;
                        @endphp
                        {{ $total }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>Total:</td>
                    <td class="tw-text-left" colspan="7">{{ $totalSemuaSemester / $jumlah_semester->count() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
