{{-- Header Component - PC/Mobile Responsive --}}
<header class="sticky top-0 z-40 border-b border-neutral-200 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/80">
    <div class="container-main">
        <div class="flex h-16 items-center justify-between">
            {{-- Logo --}}
            <div class="flex items-center gap-8">
                <a href="/" class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-lg font-semibold text-neutral-900">Community</span>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden lg:flex lg:items-center lg:gap-6">
                    <a href="/" class="text-sm font-medium text-neutral-600 transition-colors hover:text-primary-600">Home</a>
                    <a href="#" class="text-sm font-medium text-neutral-600 transition-colors hover:text-primary-600">Discussions</a>
                    <a href="#" class="text-sm font-medium text-neutral-600 transition-colors hover:text-primary-600">Categories</a>
                    <a href="#" class="text-sm font-medium text-neutral-600 transition-colors hover:text-primary-600">Members</a>
                </nav>
            </div>

            {{-- Desktop Actions --}}
            <div class="hidden items-center gap-4 lg:flex">
                {{-- Search --}}
                <div class="relative">
                    <input
                        type="search"
                        placeholder="Search..."
                        class="w-64 rounded-lg border border-neutral-200 bg-neutral-50 py-2 pl-10 pr-4 text-sm text-neutral-900 placeholder-neutral-400 transition-colors focus:border-primary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500/20"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                {{-- Auth Buttons --}}
                <a href="#" class="btn-ghost text-sm">Sign In</a>
                <a href="#" class="btn-primary text-sm">Sign Up</a>
            </div>

            {{-- Mobile Menu Button --}}
            <button
                type="button"
                class="inline-flex items-center justify-center rounded-lg p-2 text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 lg:hidden"
                aria-label="Open menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
                onclick="const menu = document.getElementById('mobile-menu'); const isHidden = menu.classList.toggle('hidden'); this.setAttribute('aria-expanded', String(!isHidden));"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden border-t border-neutral-200 py-4 lg:hidden">
            <nav class="flex flex-col gap-2">
                <a href="/" class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-900 transition-colors hover:bg-neutral-100">Home</a>
                <a href="#" class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100">Discussions</a>
                <a href="#" class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100">Categories</a>
                <a href="#" class="rounded-lg px-3 py-2 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100">Members</a>
            </nav>
            <div class="mt-4 flex flex-col gap-2 border-t border-neutral-200 pt-4">
                <input
                    type="search"
                    placeholder="Search..."
                    class="input"
                >
                <a href="#" class="btn-outline w-full justify-center text-sm">Sign In</a>
                <a href="#" class="btn-primary w-full justify-center text-sm">Sign Up</a>
            </div>
        </div>
    </div>
</header>
