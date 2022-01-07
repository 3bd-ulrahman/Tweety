<x-app>
    <form action="{{ $user->path() }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">

            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="text" name="name"
                id="name" required value="{{ $user->name }}">

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">

            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Username
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="text" name="username"
                id="username" required value="{{ $user->username }}">

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">

            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Avatar
            </label>

            <div class="flex w-full items-center justify-center bg-grey-lighter border rounded">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue
                    rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">

                    <img src="{{ $user->avatar }}" id="image" class="block mx-auto">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Select a file</span>
                    <input type='file' class="hidden" name="avatar" onchange="previewImage(this);"/>

                </label>
            </div>

            {{-- <img src="" id="image" class="block mx-auto"> --}}

            @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>



        <div class="mb-6">

            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="email" name="email"
                id="email" required value="{{ $user->email }}">

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">

            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="password" name="password"
                id="password">

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">

            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password Confirmation
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="password" name="password_confirmation"
                id="password_confirmation">

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                Submit
            </button>
            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>

    </form>

@push('script')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.readAsDataURL(input.files[0]);

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                    document.querySelector('svg').nextElementSibling.remove();
                    $('svg').remove();
                };
            }
        }
    </script>
@endpush
</x-app>
