<x-admin.template title="Zakat Fitrah">

    <section class="section">

        <div class="flex justify-between items-center gap-10">
            <h1 class="title">Zakat Fitrah</h1>
            <a class="button bg-blue-500 hover:bg-blue-600 text-white mb-5" href="{{ route('zakat_fitrah.create') }}">
                Tambah Data
            </a>
        </div>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="card mb-5">
            <form class="flex items-center gap-5">
                <div class="field">
                    <input type="text" class="control" name="q" value="{{ request()->get('q') }}"
                        placeholder="Cari Muzaki . . .">
                </div>
                <button type="submit" class="button bg-blue-500 hover:bg-blue-600 text-white">
                    Cari
                </button>
                <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white px-2"
                    href="{{ route('zakat_fitrah') }}">
                    <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-sync"></i>
                </a>
            </form>
        </div>

        @php
            $totalKeseluruhanUang = 0;
            $totalKeseluruhanBeras = 0;
        @endphp

        <div class="card hidden md:block">
            <div class="table-responsive">
                <table class="table table-xxs table-bordered">
                    <thead>
                        <tr>
                            <th class="border">No</th>
                            <th class="border">Tanggal</th>
                            <th class="border">Nama Muzaki</th>
                            <th class="border">Alamat</th>
                            <th class="border">Jumlah Jiwa</th>
                            <th class="border">Beras - Zakat Fitrah ( Kg )</th>
                            <th class="border">Uang - Zakat Fitrah ( Rp. )</th>
                            <th class="border">Fidyah ( Rp. )</th>
                            <th class="border">Total Beras ( Kg )</th>
                            <th class="border">Total Uang ( Rp. )</th>
                            <th class="border">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zakatFitrah as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                <th>{{ $item->nama_muzaki }}</th>
                                <td>{{ $item->alamat ?? '-' }}</td>
                                <td>{{ $item->jumlah_jiwa }}</td>
                                <td>{{ ($item->jumlah_beras ?? 0) . ' Kg' }}</td>
                                <td>{{ 'Rp. ' . number_format($item->nominal_zakat_fitrah) }}</td>
                                <td>{{ 'Rp. ' . number_format($item->nominal_fidyah) }}</td>
                                <td>{{ ($item->total_beras ?? 0) . ' Kg' }}</td>
                                <td>{{ 'Rp. ' . number_format($item->total_uang) }}</td>
                                <td>
                                    <div class="flex items-center gap-5">

                                        <button type="button"
                                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                                            data-target="#rincianZakatFitrah-{{ $loop->iteration }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-eye"></i>
                                        </button>

                                        <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white"
                                            href="{{ route('zakat_fitrah.edit', ['zakatFitrah' => $item]) }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-edit"></i>
                                        </a>

                                        <button type="button"
                                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                                            data-target="#hapusZakatFitrahModal-{{ $loop->iteration }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-trash-alt"></i>
                                        </button>

                                        <div class="modal" id="rincianZakatFitrah-{{ $loop->iteration }}">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content">
                                                    <div class="header">
                                                        <h4 class="text-lg">Rincian Zakat Fitrah</h4>
                                                    </div>
                                                    <div class="body">
                                                        <div class="mb-5">
                                                            <label class="label">Tanggal</label>
                                                            <span class="ml-1">{{ $item->tanggal }}</span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Nama Muzaki</label>
                                                            <span class="ml-1">{{ $item->nama_muzaki }}</span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Alamat</label>
                                                            <span class="ml-1">{{ $item->alamat ?? '-' }}</span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Jumlah Jiwa</label>
                                                            <span class="ml-1">{{ $item->jumlah_jiwa }}</span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Beras - Zakat Fitrah ( Kg )</label>
                                                            <span class="ml-1">
                                                                {{ ($item->jumlah_beras ?? 0) . ' Kg' }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Uang - Zakat Fitrah ( Rp. )</label>
                                                            <span class="ml-1">
                                                                {{ 'Rp. ' . number_format($item->nominal_zakat_fitrah) }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Jumlah Fidyah ( Rp. )</label>
                                                            <span class="ml-1">
                                                                {{ 'Rp. ' . number_format($item->nominal_fidyah) }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Total Beras ( Kg )</label>
                                                            <span
                                                                class="ml-1">{{ ($item->total_beras ?? 0) . ' Kg' }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Total Uang ( Rp. )</label>
                                                            <span
                                                                class="ml-1">{{ 'Rp. ' . number_format($item->total_uang) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="footer flex justify-end gap-x-5">
                                                        <button type="button"
                                                            class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('zakat_fitrah.destroy', ['zakatFitrah' => $item]) }}"
                                            method="POST" id="mobileHapusZakatFitrahForm-{{ $loop->iteration }}"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <div class="modal" id="hapusZakatFitrahModal-{{ $loop->iteration }}">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content">
                                                    <div class="header">
                                                        <h4>Apakah anda yakin?</h4>
                                                    </div>
                                                    <div class="footer flex justify-end gap-x-5">
                                                        <button type="button"
                                                            class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                                                            Cancel
                                                        </button>
                                                        <button type="button"
                                                            class="button sm border border-red-500 bg-red-50 hover:bg-red-100 text-red-600 form-trigger"
                                                            data-target="#mobileHapusZakatFitrahForm-{{ $loop->iteration }}">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @php
                                $totalKeseluruhanUang += $item->total_uang;
                                $totalKeseluruhanBeras += $item->total_beras;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="9">TOTAL KESELURUHAN UANG ( Rp. )</th>
                            <th colspan="2">{{ 'Rp. ' . number_format($totalKeseluruhanUang) }}</th>
                        </tr>
                        <tr>
                            <th colspan="9">TOTAL KESELURUHAN BERAS ( Kg )</th>
                            <th colspan="2">{{ ($totalKeseluruhanBeras ?? 0) . ' Kg' }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        @php
            $totalKeseluruhanUangMobile = 0;
            $totalKeseluruhanBerasMobile = 0;
        @endphp

        <div class="grid gap-7 md:hidden">

            @foreach ($zakatFitrah as $item)
                <div class="card p-5">
                    <div class="flex flex-wrap justify-between items-center gap-5 mb-7">
                        <h3 class="font-medium">{{ $item->nama_muzaki }}</h3>
                        <span class="text-xs text-gray-500">{{ date('d F Y', strtotime($item->tanggal)) }}</span>
                    </div>

                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="label">Alamat</label>
                            <span class="ml-1">{{ $item->alamat ?? '-' }}</span>
                        </div>

                        <div>
                            <label class="label">Jumlah Jiwa</label>
                            <span class="ml-1">{{ $item->jumlah_jiwa }}</span>
                        </div>

                        <div>
                            <label class="label">Beras - Zakat Fitrah ( Kg )</label>
                            <span class="ml-1">{{ ($item->jumlah_beras ?? 0) . ' Kg' }}</span>
                        </div>

                        <div>
                            <label class="label">Uang - Zakat Fitrah ( Rp. )</label>
                            <span class="ml-1">{{ 'Rp. ' . number_format($item->nominal_zakat_fitrah) }}</span>
                        </div>

                        <div>
                            <label class="label">Fidyah ( Rp. )</label>
                            <span class="ml-1">{{ 'Rp. ' . number_format($item->nominal_fidyah) }}</span>
                        </div>

                        <div>
                            <label class="label">Total Beras ( Kg )</label>
                            <span class="ml-1">{{ ($item->total_beras ?? 0) . ' Kg' }}</span>
                        </div>

                        <div>
                            <label class="label">Total Uang ( Rp. )</label>
                            <span class="ml-1">{{ 'Rp. ' . number_format($item->total_uang) }}</span>
                        </div>

                    </div>

                    <div class="flex justify-end items-center gap-5">

                        <button type="button"
                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                            data-target="#mobileRincianZakatFitrah-{{ $loop->iteration }}">
                            <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-eye"></i>
                        </button>

                        <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white"
                            href="{{ route('zakat_fitrah.edit', ['zakatFitrah' => $item]) }}">
                            <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-edit"></i>
                        </a>

                        <button type="button"
                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                            data-target="#mobileHapusZakatFitrahModal-{{ $loop->iteration }}">
                            <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-trash-alt"></i>
                        </button>

                        <div class="modal" id="mobileRincianZakatFitrah-{{ $loop->iteration }}">
                            <div class="modal-content-wrapper">
                                <div class="modal-content">
                                    <div class="header">
                                        <h4>Rincian Zakat Fitrah</h4>
                                    </div>
                                    <div class="body">
                                        <div class="mb-5">
                                            <label class="label">Tanggal</label>
                                            <span class="ml-1">{{ $item->tanggal }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Nama Muzaki</label>
                                            <span class="ml-1">{{ $item->nama_muzaki }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Alamat</label>
                                            <span class="ml-1">{{ $item->alamat ?? '-' }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Jumlah Jiwa</label>
                                            <span class="ml-1">{{ $item->jumlah_jiwa }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Beras - Zakat Fitrah ( Kg )</label>
                                            <span class="ml-1">
                                                {{ ($item->jumlah_beras ?? 0) . ' Kg' }}
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Uang - Zakat Fitrah ( Rp. )</label>
                                            <span class="ml-1">
                                                {{ 'Rp. ' . number_format($item->nominal_zakat_fitrah) }}
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Jumlah Fidyah ( Rp. )</label>
                                            <span class="ml-1">
                                                {{ 'Rp. ' . number_format($item->nominal_fidyah) }}
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Total Beras ( Kg )</label>
                                            <span class="ml-1">{{ ($item->total_beras ?? 0) . ' Kg' }}
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Total Uang ( Rp. )</label>
                                            <span class="ml-1">{{ 'Rp. ' . number_format($item->total_uang) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="footer flex justify-end gap-x-5">
                                        <button type="button"
                                            class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('zakat_fitrah.destroy', ['zakatFitrah' => $item]) }}" method="POST"
                            id="hapusZakatFitrahForm-{{ $loop->iteration }}">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="modal" id="mobileHapusZakatFitrahModal-{{ $loop->iteration }}">
                            <div class="modal-content-wrapper">
                                <div class="modal-content">
                                    <div class="header">
                                        <h4>Apakah anda yakin?</h4>
                                    </div>
                                    <div class="footer flex justify-end gap-x-5">
                                        <button type="button"
                                            class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                                            Cancel
                                        </button>
                                        <button type="button"
                                            class="button sm border border-red-500 bg-red-50 hover:bg-red-100 text-red-600 form-trigger"
                                            data-target="#hapusZakatFitrahForm-{{ $loop->iteration }}">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @php
                    $totalKeseluruhanUangMobile += $item->total_uang;
                    $totalKeseluruhanBerasMobile += $item->total_beras;
                @endphp
            @endforeach

            <div class="card">
                <label class="label">TOTAL KESELURUHAN UANG ( Rp. )</label>
                <span class="ml-1 font-medium">{{ 'Rp. ' . number_format($totalKeseluruhanUangMobile) }}</span>
            </div>

            <div class="card">
                <label class="label">TOTAL KESELURUHAN BERAS ( Kg )</label>
                <span class="ml-1 font-medium">{{ ($totalKeseluruhanBerasMobile ?? 0) . ' Kg' }}</span>
            </div>

        </div>

    </section>

</x-admin.template>
