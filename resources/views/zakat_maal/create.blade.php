<x-admin.template title="Tambah Zakat Maal / Infaq / Shedekah">

    <section class="section">

        <h1 class="title">Tambah Zakat Maal / Infaq / Shedekah</h1>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="grid gap-5">

            <div class="card">
                <a class="button bg-blue-500 hover:bg-blue-600 text-white w-max" href="{{ route('zakat_maal') }}">
                    Kembali
                </a>
            </div>

            <div class="card pt-5">

                <form action="{{ route('zakat_maal.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="field">
                            <label class="label">Nama Muzaki</label>
                            <input type="text" class="control" name="nama_muzaki" value="{{ old('nama_muzaki') }}">
                            @error('nama_muzaki')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field md:col-span-2">
                            <label class="label">Alamat</label>
                            <textarea class="control" name="alamat" rows="2">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Jenis Harta</label>
                            <input type="text" class="control" name="jenis_harta" value="{{ old('jenis_harta') }}">
                            @error('jenis_harta')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Uang ( Rp. )</label>
                            <input type="number" class="control" name="nominal_zakat_maal"
                                value="{{ old('nominal_zakat_maal') }}">
                            @error('nominal_zakat_maal')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Infaq / Shedekah ( Rp. )</label>
                            <input type="number" class="control" name="nominal_infaq_shedekah"
                                value="{{ old('nominal_infaq_shedekah') }}" reaonly>
                            @error('nominal_infaq_shedekah')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field md:col-span-2">
                            <label class="label">Keterangan</label>
                            <textarea class="control" name="keterangan" rows="2">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="flex justify-end md:col-span-2">
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
