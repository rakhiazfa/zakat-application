<x-admin.template title="Settings">

    <section class="section">

        <h1 class="title">Settings</h1>

        @if (session('success'))
            <div class="alert success mb-5">
                <p>{{ session('success') }}</p>
                <i class="close-alert uil uil-times"></i>
            </div>
        @endif

        <div class="card p-5">
            <form action="{{ route('settings.update_zakat_per_jiwa') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-5">

                    <div class="field">
                        <label class="label">Uang - Zakat / Jiwa ( Rp. )</label>
                        <input type="number" class="control" name="nominal[uang]" value="{{ $zakatPerJiwaUang }}">
                    </div>

                    <div class="field">
                        <label class="label">Beras - Zakat / Jiwa ( Kg )</label>
                        <input type="number" class="control" name="nominal[beras]" value="{{ $zakatPerJiwaBeras }}"
                            step="any">
                    </div>

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
