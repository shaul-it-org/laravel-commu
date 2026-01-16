<x-layouts.app title="Home - Community">
    {{-- Hero Section --}}
    <section class="mb-8 lg:mb-12">
        <div class="overflow-hidden rounded-2xl bg-gradient-to-r from-primary-600 to-secondary-600 px-6 py-12 text-white lg:px-12 lg:py-16">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-3xl font-bold tracking-tight lg:text-4xl">
                    Welcome to Community
                </h1>
                <p class="mt-4 text-lg text-primary-100">
                    A place where developers share knowledge, ask questions, and grow together.
                </p>
                <div class="mt-8 flex flex-col justify-center gap-4 sm:flex-row">
                    <x-ui.button variant="outline" size="lg" class="border-white bg-white/10 text-white hover:bg-white hover:text-primary-600">
                        Browse Discussions
                    </x-ui.button>
                    <x-ui.button size="lg" class="bg-white text-primary-600 hover:bg-primary-50">
                        Start a Discussion
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:gap-8">
        {{-- Sidebar (Left) - Categories - Hidden on Mobile --}}
        <aside class="hidden lg:col-span-3 lg:block">
            <x-ui.card>
                <x-slot:header>
                    <h3 class="text-sm font-semibold text-neutral-900">Categories</h3>
                </x-slot:header>
                <nav class="-mx-2 flex flex-col gap-1">
                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-primary-600 bg-primary-50">
                        <span class="flex h-2 w-2 rounded-full bg-primary-500"></span>
                        General
                        <span class="ml-auto text-xs text-neutral-500">128</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50">
                        <span class="flex h-2 w-2 rounded-full bg-green-500"></span>
                        Laravel
                        <span class="ml-auto text-xs text-neutral-500">96</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50">
                        <span class="flex h-2 w-2 rounded-full bg-yellow-500"></span>
                        JavaScript
                        <span class="ml-auto text-xs text-neutral-500">84</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50">
                        <span class="flex h-2 w-2 rounded-full bg-red-500"></span>
                        DevOps
                        <span class="ml-auto text-xs text-neutral-500">52</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-neutral-600 hover:bg-neutral-50">
                        <span class="flex h-2 w-2 rounded-full bg-purple-500"></span>
                        Career
                        <span class="ml-auto text-xs text-neutral-500">41</span>
                    </a>
                </nav>
            </x-ui.card>
        </aside>

        {{-- Main Content - Posts --}}
        <main class="lg:col-span-6">
            {{-- Mobile Categories --}}
            <div class="mb-6 flex gap-2 overflow-x-auto pb-2 lg:hidden">
                <x-ui.badge variant="primary">General</x-ui.badge>
                <x-ui.badge variant="neutral">Laravel</x-ui.badge>
                <x-ui.badge variant="neutral">JavaScript</x-ui.badge>
                <x-ui.badge variant="neutral">DevOps</x-ui.badge>
                <x-ui.badge variant="neutral">Career</x-ui.badge>
            </div>

            {{-- Tabs --}}
            <div class="mb-6 flex gap-1 rounded-lg border border-neutral-200 bg-neutral-50 p-1">
                <button class="flex-1 rounded-md bg-white px-4 py-2 text-sm font-medium text-neutral-900 shadow-sm">
                    Latest
                </button>
                <button class="flex-1 rounded-md px-4 py-2 text-sm font-medium text-neutral-500 hover:text-neutral-900">
                    Popular
                </button>
                <button class="flex-1 rounded-md px-4 py-2 text-sm font-medium text-neutral-500 hover:text-neutral-900">
                    Unanswered
                </button>
            </div>

            {{-- Post List --}}
            <div class="space-y-4">
                {{-- Post Item --}}
                @for ($i = 1; $i <= 5; $i++)
                <x-ui.card hover href="#">
                    <div class="flex gap-4">
                        <x-ui.avatar initials="{{ chr(64 + $i) }}{{ chr(65 + $i) }}" />
                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-4">
                                <h3 class="font-medium text-neutral-900 line-clamp-2">
                                    How to optimize Laravel queries for better performance?
                                </h3>
                                <x-ui.badge variant="{{ $i === 1 ? 'success' : 'neutral' }}" size="sm">
                                    {{ $i === 1 ? 'Solved' : 'Open' }}
                                </x-ui.badge>
                            </div>
                            <p class="mt-1 text-sm text-neutral-500 line-clamp-2">
                                I'm working on a Laravel application and noticed that some queries are taking too long. What are the best practices for optimizing database queries?
                            </p>
                            <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-neutral-500">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    {{ rand(5, 30) }} replies
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{ rand(100, 500) }} views
                                </span>
                                <span>{{ rand(1, 24) }}h ago</span>
                                <span class="hidden sm:inline">in <span class="font-medium text-primary-600">Laravel</span></span>
                            </div>
                        </div>
                    </div>
                </x-ui.card>
                @endfor
            </div>

            {{-- Load More --}}
            <div class="mt-8 text-center">
                <x-ui.button variant="outline">
                    Load More Posts
                </x-ui.button>
            </div>
        </main>

        {{-- Sidebar (Right) - Widgets --}}
        <aside class="lg:col-span-3">
            <div class="space-y-6">
                {{-- Popular Tags --}}
                <x-ui.card>
                    <x-slot:header>
                        <h3 class="text-sm font-semibold text-neutral-900">Popular Tags</h3>
                    </x-slot:header>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">laravel</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">php</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">javascript</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">vue</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">tailwind</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">docker</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">mysql</a>
                        <a href="#" class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-700 hover:bg-neutral-200">api</a>
                    </div>
                </x-ui.card>

                {{-- Top Contributors --}}
                <x-ui.card>
                    <x-slot:header>
                        <h3 class="text-sm font-semibold text-neutral-900">Top Contributors</h3>
                    </x-slot:header>
                    <div class="space-y-4">
                        @foreach(['John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Wilson'] as $index => $name)
                        <div class="flex items-center gap-3">
                            <x-ui.avatar initials="{{ substr($name, 0, 1) }}{{ substr(explode(' ', $name)[1] ?? '', 0, 1) }}" size="sm" />
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-medium text-neutral-900">{{ $name }}</p>
                                <p class="text-xs text-neutral-500">{{ rand(50, 200) }} posts</p>
                            </div>
                            <span class="text-xs font-medium text-primary-600">#{{ $index + 1 }}</span>
                        </div>
                        @endforeach
                    </div>
                </x-ui.card>

                {{-- Stats --}}
                <x-ui.card>
                    <x-slot:header>
                        <h3 class="text-sm font-semibold text-neutral-900">Community Stats</h3>
                    </x-slot:header>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-primary-600">1.2K</p>
                            <p class="text-xs text-neutral-500">Members</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-secondary-600">3.4K</p>
                            <p class="text-xs text-neutral-500">Discussions</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-green-600">12K</p>
                            <p class="text-xs text-neutral-500">Replies</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-yellow-600">89%</p>
                            <p class="text-xs text-neutral-500">Solved</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </aside>
    </div>
</x-layouts.app>
