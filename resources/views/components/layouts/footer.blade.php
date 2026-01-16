{{-- Footer Component --}}
<footer class="border-t border-neutral-200 bg-white">
    <div class="container-main py-12">
        {{-- Desktop Footer --}}
        <div class="hidden grid-cols-4 gap-8 lg:grid">
            {{-- Brand --}}
            <div class="col-span-1">
                <a href="/" class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-lg font-semibold text-neutral-900">Community</span>
                </a>
                <p class="mt-4 text-sm text-neutral-500">
                    A place where developers share knowledge and grow together.
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="text-sm font-semibold text-neutral-900">Community</h4>
                <ul class="mt-4 space-y-3">
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Discussions</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Categories</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Tags</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Members</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-neutral-900">Resources</h4>
                <ul class="mt-4 space-y-3">
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Documentation</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">FAQ</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Guidelines</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">API</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-neutral-900">Legal</h4>
                <ul class="mt-4 space-y-3">
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Terms of Service</a></li>
                    <li><a href="#" class="text-sm text-neutral-500 transition-colors hover:text-primary-600">Cookie Policy</a></li>
                </ul>
            </div>
        </div>

        {{-- Mobile Footer --}}
        <div class="space-y-6 lg:hidden">
            <a href="/" class="flex items-center gap-2">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-lg font-semibold text-neutral-900">Community</span>
            </a>
            <div class="flex flex-wrap gap-4 text-sm">
                <a href="#" class="text-neutral-500 hover:text-primary-600">Discussions</a>
                <a href="#" class="text-neutral-500 hover:text-primary-600">Categories</a>
                <a href="#" class="text-neutral-500 hover:text-primary-600">Members</a>
                <a href="#" class="text-neutral-500 hover:text-primary-600">FAQ</a>
                <a href="#" class="text-neutral-500 hover:text-primary-600">Privacy</a>
                <a href="#" class="text-neutral-500 hover:text-primary-600">Terms</a>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-8 border-t border-neutral-200 pt-8">
            <p class="text-center text-sm text-neutral-500">
                &copy; {{ date('Y') }} Community. All rights reserved. Built with Laravel.
            </p>
        </div>
    </div>
</footer>
