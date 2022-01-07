<div class="border border-blue-500 rounded-lg px-8 py-6 mb-8">

    <form action="/tweets" method="post">
        @csrf

        <textarea name="body"
            class="w-full resize-none"
            placeholder="what`s up doc?" required
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="50px"
                height="50px">

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 rounded-xl shadow px-10 text-sm text-white h-10">
                    Publish
                </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
