<x-admin.template title="Pembagian">

    <section class="section">

        <h1 class="title">Pembagian</h1>

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
                            <label class="label mb-5">{{ $item->jenis_penerima }}</label>
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
