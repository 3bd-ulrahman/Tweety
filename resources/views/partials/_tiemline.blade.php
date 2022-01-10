<div class="border border-gray-300 rounded-xl mb-12">

    @forelse ($tweets as $tweet)
        @include('partials._tweet')
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse

</div>

<div class="mb-12">
    {{ $tweets->links() }}
</div>
