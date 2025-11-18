<x-layouts.app.sidebar :title="$title ?? null">
<flux:main>
    <div class="p-4">
        <a href="{{ route('home') }}"
           class="inline-block px-4 py-2 mb-4 bg-blue-600 text-white rounded hover:bg-blue-500">
            ⬅️ Volver al Inicio
        </a>
    </div>

    {{ $slot }}
</flux:main>
</x-layouts.app.sidebar>
