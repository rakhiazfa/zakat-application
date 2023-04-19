<x-admin.template title="Tambah Penerima">

    <section class="section">

        <h1 class="title">Tambah Penerima</h1>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-5">

            <div class="card">
                <a class="button bg-blue-500 hover:bg-blue-600 text-white w-max" href="{{ route('pembagian') }}">
                    Kembali
                </a>
            </div>

            <div class="card pt-5">

                <form action="{{ route('pembagian.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        <div class="field">
                            <label class="label">Jenis Penerima</label>
                            <input type="text" class="control" name="jenis_penerima"
                                value="{{ old('jenis_penerima') }}">
                            @error('jenis_penerima')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Persentase ( % )</label>
                            <input type="number" step="any" class="control" name="persentase"
                                value="{{ old('persentase') }}">
                            @error('persentase')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Jumlah Penerima</label>
                            <input type="number" step="any" class="control" name="jumlah_penerima"
                                value="{{ old('jumlah_penerima') }}">
                            @error('jumlah_penerima')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end md:col-span-3">
                            <button type="submit" class="button bg-blue-500 hover:bg-blue-600 text-white">
                                Simpan
                            </button>
                        </div>

                    </div>

                </form>
            </div>

        </div>

    </section>

</x-admin.template>
