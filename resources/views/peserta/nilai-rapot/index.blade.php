<x-app-layout pageTitle="Nilai Rapot">
    <div class="card card-body">
        <table class="table text-center table-bordered table-hover table-primary">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Matpel</th>
                    <th colspan="{{ $jumlah_semester->count() }}">NILAI</th>
                    <th rowspan="2">Rata Rata</th>
                </tr>
                <tr>
                    @foreach ($jumlah_semester as $item)
                    <th>Semester {{ $item->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key }}</td>
                    @foreach ($item as $itemNilai)
                        @if ($itemNilai && $itemNilai['nilai'])
                            <td>{{ $itemNilai['nilai'] }}</td>
                            @else
                            <td>-</td>
                        @endif
                    @endforeach
                    <td>
                       90
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
