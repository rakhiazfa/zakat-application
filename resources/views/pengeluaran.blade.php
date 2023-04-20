<x-admin.template title="Pengeluaran">

    <section class="section">

        <h1 class="title">Pengeluaran</h1>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="card mb-5">
            <form action="{{ route('pengeluaran.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="field">
                        <label class="label">Keterangan</label>
                        <input type="text" class="control" name="keterangan" value="{{ old('keterangan') }}">
                        @error('keterangan')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Nominal ( Rp. )</label>
                        <input type="number" class="control" name="nominal" value="{{ old('nominal') }}">
                        @error('nominal')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end md:col-span-2">
                        <button type="submit" class="button bg-blue-500 hover:bg-blue-600 text-white">
                            Simpan
                        </button>
                    </div>

                </div>

            </form>
        </div>

        <div class="card p-5">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Nominal ( Rp. )</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ 'Rp. ' . number_format($item->nominal) }}</td>
                                <td>
                                    <div class="flex items-center gap-5">

                                        <button type="button"
                                            class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                                            data-target="#hapusPengeluaranModal-{{ $loop->iteration }}">
                                            <i
                                                class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-trash-alt"></i>
                                        </button>

                                        <form action="{{ route('pengeluaran.destroy', ['pengeluaran' => $item]) }}"
                                            method="POST" id="hapusPengeluaranForm-{{ $loop->iteration }}"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <div class="modal" id="hapusPengeluaranModal-{{ $loop->iteration }}">
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
                                                            data-target="#hapusPengeluaranForm-{{ $loop->iteration }}">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">TOTAL PENGELUARAN</th>
                            <th colspan="2">
                                {{ 'Rp. ' . number_format(\App\Models\Pengeluaran::getTotalPengeluaran()) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </section>

</x-admin.template>
