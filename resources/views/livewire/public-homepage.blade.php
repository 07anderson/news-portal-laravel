<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold sm:text-5xl md:text-6xl">
                    Welcome to News Portal
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Stay updated with the latest news and stories from around the world.
                </p>
                @guest
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                Join Us
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="{{ route('login') }}"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-400 md:py-4 md:text-lg md:px-10">
                                Sign In
                            </a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    {{-- Latest News Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Latest News</h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Stay informed with our most recent stories</p>
            </div>
            @if (request()->routeIs('categories.show'))
                <div class="mt-6 sm:mt-0">
                    <a href="{{ route('home') }}" wire:navigate
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                        ← Back to All News
                    </a>
                </div>
            @endif
        </div>

        {{-- Search Bar --}}
        <div class="mb-8">
            <input type="text" 
                wire:model.live.debounce.300ms="search" 
                placeholder="Search news by title..."
                maxlength="50"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                {{ strlen($search) }}/50 caracteres
            </p>
        </div>

        @if ($news->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($news as $item)
                <article class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                @if ($item->first_image)
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ Storage::url($item->first_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            {{ $item->category->name }}
                        </span>
                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $item->title }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        {{ $item->excerpt }}
                    </p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-8 w-8">
                                <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-medium text-sm">
                                    {{ $item->author->initials() }}
                                </div>
                            </div>
                            <div class="ml-2">
                                <p class="text-sm text-gray-900 dark:text-white">{{ $item->author->name }}</p>
                            </div>
                        </div>

                        <a href="{{ route('news.show', $item) }}"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200">
                            Read More
                        </a>
                    </div>

                    <div class="mt-4 flex items-center text-sm text-gray-500 dark:text-gray-400">
                        {{ $item->views_count }} {{ Str::plural('view', $item->views_count) }}
                    </div>
                </div>
                </article>
            @endforeach

            </div>
            <div class="mt-10">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    @if ($search)
                        No news found matching "{{ $search }}"
                    @else
                        No news available
                    @endif
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    @if ($search)
                        Try a different search term or check back later.
                    @else
                        Check back later for the latest updates.
                    @endif
                </p>
            </div>
        @endif
    </div>
</div>
