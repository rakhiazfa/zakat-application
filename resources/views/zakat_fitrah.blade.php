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

        @php
            $totalKeseluruhan = 0;
        @endphp

        <div class="card">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Muzaki</th>
                            <th>Alamat</th>
                            <th>Jumlah Jiwa</th>
                            <th>Total</th>
                            <th>#</th>
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
                                <td>Rp. {{ number_format($item->total) }}</td>
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
                                                            <label class="label">Jumlah Zakat Fitrah ( Rp. )</label>
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

                                        <form action="{{ route('zakat_fitrah.destroy', ['zakatFitrah' => $item]) }}"
                                            method="POST" id="hapusZakatFitrahForm-{{ $loop->iteration }}">
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
                                                            data-target="#hapusZakatFitrahForm-{{ $loop->iteration }}">
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
                            <th colspan="5">TOTAL KESELURUHAN</th>
                            <th colspan="2">{{ 'Rp. ' . number_format($totalKeseluruhan) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </section>

</x-admin.template>
