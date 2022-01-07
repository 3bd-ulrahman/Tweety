<x-master>
    <section class="px-8">
        <main class="container mx-auto">

        @auth
            <div class="lg:flex lg:justify-between">

                <div class="lg:w-32">
                    @include('partials._sidebar-links')
                </div>

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">

                    {{ $slot }}

                </div>

                <div class="lg:w-1/6">
                    @include('partials._friends-list')
                </div>

            </div>
        @endauth

        @guest
            @yield('content')
        @endguest

        </main>
    </section>
</x-master>