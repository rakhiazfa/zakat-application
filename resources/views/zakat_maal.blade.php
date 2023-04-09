<x-admin.template title="Zakat Maal / Infaq / Shedekah">

    <section class="section">

        <div class="flex justify-between items-center gap-10">
            <h1 class="title">Zakat Maal / Infaq / Shedekah</h1>
            <a class="button bg-blue-500 hover:bg-blue-600 text-white mb-5" href="{{ route('zakat_maal.create') }}">
                Tambah Data
            </a>
        </div>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        @php
            $totalKeseluruhan = 0;
        @endphp

        <div class="card hidden md:block">
            <div class="table-responsive">
                <table class="table table-xs table-bordered">
                    <thead>
                        <tr>
                            <th class="border" rowspan="2">No</th>
                            <th class="border" rowspan="2">Tanggal</th>
                            <th class="border" rowspan="2">Nama Muzaki</th>
                            <th class="border" rowspan="2">Alamat</th>
                            <th class="border" colspan="2" style="text-align: center !important;">Zakat Maal</th>
                            <th class="border" rowspan="2">Infaq / Shedekah ( Rp. )</th>
                            <th class="border" rowspan="2">Total ( Rp. )</th>
                            <th class="border" rowspan="2">#</th>
                        </tr>
                        <tr>
                            <th class="border">Jenis Harta</th>
                            <th class="border">Uang ( Rp. )</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zakatMaal as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                <th>{{ $item->nama_muzaki }}</th>
                                <td>{{ $item->alamat ?? '-' }}</td>
                                <td>{{ $item->jenis_harta ?? '-' }}</td>
                                <td>Rp. {{ number_format($item->nominal_zakat_maal ?? 0) }}</td>
                                <td>Rp. {{ number_format($item->nominal_infaq_shedekah ?? 0) }}</td>
                                <td>Rp. {{ number_format($item->total) }}</td>
                                <td>
                                    <div class="flex items-center gap-5">

                                        <button type="button"
                                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                                            data-target="#rincianZakatMaal-{{ $loop->iteration }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-eye"></i>
                                        </button>

                                        <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white"
                                            href="{{ route('zakat_maal.edit', ['zakatMaal' => $item]) }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-edit"></i>
                                        </a>

                                        <button type="button"
                                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                                            data-target="#hapusZakatMaalModal-{{ $loop->iteration }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-trash-alt"></i>
                                        </button>

                                        <div class="modal" id="rincianZakatMaal-{{ $loop->iteration }}">
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
                                                            <label class="label">Jenis Harta</label>
                                                            <span class="ml-1">{{ $item->jenis_harta ?? '-' }}</span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Uang ( Rp. )</label>
                                                            <span class="ml-1">
                                                                {{ 'Rp. ' . number_format($item->nominal_zakat_maal) }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Infaq / Shedekah ( Rp. )</label>
                                                            <span class="ml-1">
                                                                {{ 'Rp. ' . number_format($item->nominal_infaq_shedekah) }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="label">Total ( Rp. )</label>
                                                            <span
                                                                class="ml-1">{{ 'Rp. ' . number_format($item->total) }}
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

                                        <form action="{{ route('zakat_maal.destroy', ['zakatMaal' => $item]) }}"
                                            method="POST" id="mobileHapusZakatMaalForm-{{ $loop->iteration }}"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <div class="modal" id="hapusZakatMaalModal-{{ $loop->iteration }}">
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
                                                            data-target="#mobileHapusZakatMaalForm-{{ $loop->iteration }}">
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
                                $totalKeseluruhan += $item->total;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="border" colspan="7">TOTAL KESELURUHAN</th>
                            <th class="border" colspan="2">{{ 'Rp. ' . number_format($totalKeseluruhan) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        @php
            $totalKeseluruhanMobile = 0;
        @endphp

        <div class="grid gap-7 md:hidden">

            @foreach ($zakatMaal as $item)
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
                            <label class="label">Jenis Harta</label>
                            <span class="ml-1">{{ $item->jenis_harta ?? '-' }}</span>
                        </div>

                        <div>
                            <label class="label">Uang ( Rp. )</label>
                            <span class="ml-1">{{ 'Rp. ' . number_format($item->nominal_zakat_maal) }}</span>
                        </div>

                        <div>
                            <label class="label">Infaq / Shedekah ( Rp. )</label>
                            <span class="ml-1">{{ 'Rp. ' . number_format($item->nominal_infaq_shedekah) }}</span>
                        </div>

                        <div>
                            <label class="label">Total ( Rp. )</label>
                            <span class="ml-1">{{ 'Rp. ' . number_format($item->total) }}</span>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-5">

                        <button type="button"
                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                            data-target="#mobileRincianZakatMaal-{{ $loop->iteration }}">
                            <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-eye"></i>
                        </button>

                        <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white"
                            href="{{ route('zakat_maal.edit', ['zakatMaal' => $item]) }}">
                            <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-edit"></i>
                        </a>

                        <button type="button"
                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                            data-target="#mobileHapusZakatMaalModal-{{ $loop->iteration }}">
                            <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-trash-alt"></i>
                        </button>

                        <div class="modal" id="mobileRincianZakatMaal-{{ $loop->iteration }}">
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
                                            <label class="label">Jenis Harta</label>
                                            <span class="ml-1">{{ $item->jenis_harta ?? '-' }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Uang ( Rp. )</label>
                                            <span class="ml-1">
                                                {{ 'Rp. ' . number_format($item->nominal_zakat_maal) }}
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Infaq / Shedekah ( Rp. )</label>
                                            <span class="ml-1">
                                                {{ 'Rp. ' . number_format($item->nominal_infaq_shedekah) }}
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Total ( Rp. )</label>
                                            <span class="ml-1">{{ 'Rp. ' . number_format($item->total) }}
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

                        <form action="{{ route('zakat_maal.destroy', ['zakatMaal' => $item]) }}" method="POST"
                            id="hapusZakatMaalForm-{{ $loop->iteration }}">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="modal" id="mobileHapusZakatMaalModal-{{ $loop->iteration }}">
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
                                            data-target="#hapusZakatMaalForm-{{ $loop->iteration }}">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @php
                    $totalKeseluruhanMobile += $item->total;
                @endphp
            @endforeach

            <div class="card">
                <label class="label">TOTAL KESELURUHAN</label>
                <span class="ml-1 font-medium">{{ 'Rp. ' . number_format($totalKeseluruhanMobile) }}</span>
            </div>

        </div>

    </section>

</x-admin.template>
