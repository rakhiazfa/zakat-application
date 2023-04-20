<x-admin.template title="Dashboard">

    <section class="section">

        <h1 class="title">Dashboard</h1>

        <div class="grid grid-cols-2 xl:grid-cols-4 gap-5 mb-5">

            <div class="card h-max">
                <h1 class="card-title sm text-gray-500 mb-5">Total Uang</h1>
                <div class="card-body">
                    <div class="flex items-center gap-5">
                        <i class="text-2xl uil uil-credit-card"></i>
                        <span class="font-semibold">
                            {{ 'Rp. ' . number_format($totalUang - \App\Models\Pengeluaran::getTotalPengeluaran()) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="card h-max">
                <h1 class="card-title sm text-gray-500 mb-5">Jumlah KK</h1>
                <div class="card-body">
                    <div class="flex items-center gap-5">
                        <i class="uil uil-file -mt-1"></i>
                        <span class="font-semibold"> {{ $jumlahKK }} </span>
                    </div>
                </div>
            </div>

            <div class="card h-max">
                <h1 class="card-title sm text-gray-500 mb-5">Total Users</h1>
                <div class="card-body">
                    <div class="flex items-center gap-5">
                        <i class="text-2xl uil uil-user"></i>
                        <span class="font-semibold"> {{ $userCount }} </span>
                    </div>
                </div>
            </div>

            <div class="card h-max">
                <h1 class="card-title sm text-gray-500 mb-5">Online Users</h1>
                <div class="card-body">
                    <div class="flex items-center gap-5">
                        <div class="relative">
                            <i class="text-2xl uil uil-user"></i>
                            <span class="absolute top-[-5px] right-[-5px] flex h-3 w-3">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                            </span>
                        </div>
                        <span class="font-semibold"> {{ $onlineUserCount }} </span>
                    </div>
                </div>
            </div>

        </div>

        @php
            $totalKeseluruhanKK = 0;
            $totalKeseluruhanJiwa = 0;
            $totalKeseluruhanUangZakatFitrah = 0;
            $totalKeseluruhanBerasZakatFitrah = 0;
            $totalKeseluruhanZakatMaal = 0;
            $totalKeseluruhanInfaqShedekah = 0;
            $totalKeseluruhanFidyah = 0;
            $totalKeseluruhan = 0;
        @endphp

        <div class="card mb-5">
            <div class="table-responsive">
                <table class="table table-xxs table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center;">RT</th>
                            <th rowspan="2" style="text-align: center;">No</th>
                            <th colspan="2" style="text-align: center;">Banyak Muzaki</th>
                            <th colspan="2" style="text-align: center;">Zakat Fitrah</th>
                            <th colspan="2" style="text-align: center;">Zakat Maal</th>
                            <th colspan="2" style="text-align: center;">Infaq / Shodaqoh</th>
                            <th colspan="2" style="text-align: center;">Fidyah</th>
                            <th rowspan="2" style="text-align: center;">Total</th>
                        </tr>
                        <tr>
                            <th>KK</th>
                            <th>Jiwa ( Orang )</th>
                            <th>Beras ( KG )</th>
                            <th>Uang ( Rp. )</th>
                            <th>Jenis Barang</th>
                            <th>Uang ( Rp. )</th>
                            <th>Beras ( KG )</th>
                            <th>Uang ( Rp. )</th>
                            <th>Jenis Barang</th>
                            <th>Uang ( Rp. )</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($amilZakat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->totalKK() }}</td>
                                <td>{{ $item->totalJiwa() }}</td>
                                <td>{{ ($item->totalBerasZakatFitrah() ?? 0) . ' Kg' }}</td>
                                <td>{{ 'Rp. ' . number_format($item->totalUangZakatFitrah()) }}</td>
                                <td></td>
                                <td>{{ 'Rp. ' . number_format($item->totalZakatMaal()) }}</td>
                                <td></td>
                                <td>{{ 'Rp. ' . number_format($item->totalInfaqShedekah()) }}</td>
                                <td></td>
                                <td>{{ 'Rp. ' . number_format($item->totalFidyah()) }}</td>
                                <td>{{ 'Rp. ' . number_format($item->totalKeseluruhan()) }}</td>
                            </tr>

                            @php
                                $totalKeseluruhanKK += $item->totalKK();
                                $totalKeseluruhanJiwa += $item->totalJiwa();
                                $totalKeseluruhanUangZakatFitrah += $item->totalUangZakatFitrah();
                                $totalKeseluruhanBerasZakatFitrah += $item->totalBerasZakatFitrah();
                                $totalKeseluruhanZakatMaal += $item->totalZakatMaal();
                                $totalKeseluruhanInfaqShedekah += $item->totalInfaqShedekah();
                                $totalKeseluruhanFidyah += $item->totalFidyah();
                                $totalKeseluruhan += $item->totalKeseluruhan();
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="2">TOTAL KESELURUHAN</th>
                        <th>{{ $totalKeseluruhanKK }}</th>
                        <th>{{ $totalKeseluruhanJiwa }}</th>
                        <th>
                            {{ ($totalKeseluruhanBerasZakatFitrah ?? 0) . ' Kg' }}
                        </th>
                        <th style="text-align: right;">
                            {{ 'Rp. ' . number_format($totalKeseluruhanUangZakatFitrah) }}
                        </th>
                        <th colspan="2" style="text-align: right;">
                            {{ 'Rp. ' . number_format($totalKeseluruhanZakatMaal) }}
                        </th>
                        <th colspan="2" style="text-align: right;">
                            {{ 'Rp. ' . number_format($totalKeseluruhanInfaqShedekah) }}
                        </th>
                        <th colspan="2" style="text-align: right;">
                            {{ 'Rp. ' . number_format($totalKeseluruhanFidyah) }}</th>
                        <th>{{ 'Rp. ' . number_format($totalKeseluruhan) }}</th>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card mb-5">
            <div class="table-responsive">
                <table class="table table-xs table-bordered">
                    <thead>
                        <tr>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ 'Rp. ' . number_format($totalKeseluruhan) }}</th>
                            <th>{{ 'Rp. ' . number_format(\App\Models\Pengeluaran::getTotalPengeluaran()) }}</th>

                            @php
                                $totalKeseluruhan -= \App\Models\Pengeluaran::getTotalPengeluaran();
                            @endphp

                            <th>{{ 'Rp. ' . number_format($totalKeseluruhan) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @php
            $totalPersentase = 0;
        @endphp

        <div class="card mb-5">
            <div class="table-responsive">
                <table class="table table-xs table-bordered">
                    <thead>
                        <tr>
                            <th>Jenis Penerima</th>
                            <th>Total Uang</th>
                            <th>Persentase ( % )</th>
                            <th>Hasil ( Rp. )</th>
                            <th>Jumlah Penerima</th>
                            <th>Hasil ( Rp. )</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembagian as $item)
                            <tr>
                                <th>{{ $item->jenis_penerima }}</th>
                                <td>{{ 'Rp. ' . number_format($totalKeseluruhan) }}</td>
                                <td>{{ $item->persentase . ' %' }}</td>
                                <td>{{ 'Rp. ' . number_format($item->inputTotalUang($totalKeseluruhan)) }}</td>
                                <td>{{ $item->jumlah_penerima }}</td>
                                <td>
                                    {{ 'Rp. ' . number_format((float) $item->inputTotalUang($totalKeseluruhan) / (float) $item->jumlah_penerima) }}
                                </td>
                            </tr>

                            @php
                                $totalPersentase += $item->persentase;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="2"></th>
                        <th>{{ $totalPersentase . ' %' }}</th>
                        <th colspan="3"></th>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card w-full sm:w-[400px] p-0">
            <div class="bg-blue-100 rounded-t-md p-4 mb-5">
                <div class="card-title text-blue-600">Welcome Back !</div>
            </div>
            <div class="card-body px-4 pb-4">
                <div class="flex items-center gap-3 mb-5">
                    <img class="w-[55px] aspect-square rounded-full shadow-lg object-cover"
                        src="{{ auth()->user()->avatar_link }}" alt="Avatar Image">
                    <div class="flex flex-col">
                        <span
                            class="text-sm text-gray-500 font-normal">{{ auth()->user()->name ?? 'Rakhi Azfa Rifansya' }}</span>
                        <span class="text-xs text-gray-500">
                            {{ Str::limit(implode(' | ',auth()->user()->roles->pluck('name')->toArray()),20) }}
                        </span>
                    </div>
                </div>

                <a class="button w-full bg-blue-500 hover:bg-blue-600 text-white" href="{{ route('profile') }}">
                    View Profile
                </a>
            </div>
        </div>

    </section>

</x-admin.template>
