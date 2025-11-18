<x-layouts.app :title="__('Dashboard')">
    <div class="p-6 space-y-6">

        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        {{-- Estadísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="p-4 bg-white dark:bg-neutral-900 shadow rounded-xl">
                <p class="text-gray-500">Total Noticias</p>
                <p class="text-3xl font-bold">{{ $newsCount }}</p>
            </div>

            <div class="p-4 bg-white dark:bg-neutral-900 shadow rounded-xl">
                <p class="text-gray-500">Publicadas</p>
                <p class="text-3xl font-bold">{{ $published }}</p>
            </div>

            <div class="p-4 bg-white dark:bg-neutral-900 shadow rounded-xl">
                <p class="text-gray-500">Borradores</p>
                <p class="text-3xl font-bold">{{ $drafts }}</p>
            </div>

            <div class="p-4 bg-white dark:bg-neutral-900 shadow rounded-xl">
                <p class="text-gray-500">Usuarios registrados</p>
                <p class="text-3xl font-bold">{{ $usersCount }}</p>
            </div>

        </div>

        {{-- Últimas noticias --}}
        <div class="bg-white dark:bg-neutral-900 shadow rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">Últimas noticias</h2>

            @foreach ($latestNews as $news)
                <div class="py-2 border-b border-neutral-200 dark:border-neutral-700">
                    <strong>{{ $news->title }}</strong>
                    <span class="text-gray-500 text-sm">
                        – {{ $news->created_at->diffForHumans() }}
                    </span>
                </div>
            @endforeach
        </div>

    </div>
</x-layouts.app>
