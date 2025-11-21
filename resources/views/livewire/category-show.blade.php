<div class="container mx-auto py-10">

    <!-- Título de la categoría -->
    <h1 class="text-3xl font-bold mb-6">
        Noticias en: {{ $category->name }}
    </h1>

    <!-- Si hay noticias -->
    @if ($this->news->count() > 0)

        <div class="grid md:grid-cols-2 gap-6">

            @foreach ($this->news as $item)
                <div class="p-5 border rounded-lg shadow-sm bg-white">

                    <h2 class="text-xl font-semibold">
                        <a href="{{ route('news.show', $item->id) }}" class="hover:underline">
                            {{ $item->title }}
                        </a>
                    </h2>

                    <p class="text-gray-600 mt-2">
                        {{ Str::limit($item->paragraph, 120) }}
                    </p>

                    <p class="text-sm text-gray-500 mt-3">
                        Categoría: {{ $item->category->name }}
                        <br>
                        Autor: {{ $item->author->name }}
                        <br>
                        Publicado: {{ $item->created_at->format('d/m/Y') }}
                    </p>

                </div>
            @endforeach

        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $this->news->links() }}
        </div>

    @else
        <!-- Si no hay noticias -->
        <p class="text-gray-600 text-lg">
            No hay noticias publicadas en esta categoría.
        </p>
    @endif

</div>
