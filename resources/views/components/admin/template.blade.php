<x-template :title="$title">

    <div class="admin-wrapper">

        <x-admin.sidebar :user="$user"></x-admin.sidebar>

        <div class="content">

            <x-admin.topbar :user="$user"></x-admin.topbar>

            <main class="main">

                {{ $slot }}

            </main>

        </div>

    </div>

    @section('template_styles')
        @vite('resources/css/template.css')
    @endsection

    @section('template_scripts')
        @vite('resources/js/template.js')
    @endsection

</x-template>
