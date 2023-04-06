<x-admin.template title="Tambah Zakat Fitrah">

    <section class="section">

        <h1 class="title">Tambah Zakat Fitrah</h1>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="grid gap-5">

            <div class="card">
                <a class="button bg-blue-500 hover:bg-blue-600 text-white w-max" href="{{ route('zakat_fitrah') }}">
                    Kembali
                </a>
            </div>

            <div class="card pt-5">
                <div class="table-responsive mb-10">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Zakat / Jiwa</th>
                            <th id="zakat-per-jiwa" data-nominal="{{ $zakatPerJiwa }}">
                                Rp. {{ number_format($zakatPerJiwa) }}
                            </th>
                        </tr>
                    </table>
                </div>

                <form action="{{ route('zakat_fitrah.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="field">
                            <label class="label">Nama Muzaki</label>
                            <input type="text" class="control" name="nama_muzaki" value="{{ old('nama_muzaki') }}">
                            @error('nama_muzaki')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Jumlah Jiwa</label>
                            <input type="number" class="control" name="jumlah_jiwa" value="{{ old('jumlah_jiwa') }}">
                            @error('jumlah_jiwa')
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
                            <label class="label">Jumlah Beras ( Kg )</label>
                            <input type="number" class="control" name="jumlah_beras"
                                value="{{ old('jumlah_beras') }}">
                            @error('jumlah_beras')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Beras Diuangkan ( Rp. )</label>
                            <input type="number" class="control" name="jumlah_beras_diuangkan"
                                value="{{ old('jumlah_beras_diuangkan') }}">
                            @error('jumlah_beras_diuangkan')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Zakat Fitrah ( Rp. )</label>
                            <input type="number" class="control" name="nominal_zakat_fitrah"
                                value="{{ old('nominal_zakat_fitrah') }}" reaonly>
                            @error('nominal_zakat_fitrah')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Fidyah ( Rp. )</label>
                            <input type="number" class="control" name="nominal_fidyah"
                                value="{{ old('nominal_fidyah') }}">
                            @error('nominal_fidyah')
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

    @section('scripts')
        @vite('resources/js/pages/zakat_fitrah.js')
    @endsection

</x-admin.template>
