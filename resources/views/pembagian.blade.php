<x-admin.template title="Pembagian">

    <section class="section">

        <div class="flex justify-between items-center gap-10">
            <h1 class="title">Pembagian</h1>
            <a class="button bg-blue-500 hover:bg-blue-600 text-white mb-5" href="{{ route('pembagian.create') }}">
                Tambah Penerima
            </a>
        </div>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="card p-5">
            <form action="{{ route('pembagian.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-5">

                    @foreach ($pembagian as $item)
                        <div class="field">
                            <div class="flex justify-between items-center gap-10 mb-5">
                                <label class="font-medium">{{ $item->jenis_penerima }}</label>
                                <button type="button"
                                    class="bg-red-500 hover:bg-red-600 text-xs xs:text-sm font-medium text-white rounded-md px-3 py-1 modal-trigger"
                                    data-target="#deletePembagian-{{ $loop->iteration }}">
                                    Delete
                                </button>
                            </div>
                            <div class="grid grid-cols-2 gap-5">
                                <div class="field">
                                    <label class="label">Persentase</label>
                                    <input type="number" step=".01" class="control"
                                        name="persentase[{{ $item->id }}]" value="{{ $item->persentase }}">
                                </div>
                                <div class="field">
                                    <label class="label">Jumlah Penerima</label>
                                    <input type="number" class="control" name="jumlah_penerima[{{ $item->id }}]"
                                        value="{{ $item->jumlah_penerima }}">
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('pembagian.destroy', ['pembagian' => $item]) }}" method="POST"
                            id="deletePembagianForm-{{ $loop->iteration }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <div class="modal" id="deletePembagian-{{ $loop->iteration }}">
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
                                            data-target="#deletePembagianForm-{{ $loop->iteration }}">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-end">
                        <button type="submit" class="button bg-emerald-500 hover:bg-emerald-600 text-white">
                            Simpan
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </section>

</x-admin.template>
