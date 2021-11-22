<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="px-6 py-5 font-semibold text-gray-700 bg-gray-200 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Update Member') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('APImemberUpdatedd') }}">
                    @csrf
                    <input type="hidden" value="{{$member['id']}}" name='id'>
                    <div class="flex flex-wrap">
                        <label for="name" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text" value="{{$member['name']}}"
                            class="form-input w-full @error('name') border-red-500 @enderror" name="name"
                            required>

                        @error('name')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{$member['email'] }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>


                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full p-3 text-base font-bold leading-normal text-gray-100 no-underline whitespace-no-wrap bg-blue-500 rounded-lg select-none hover:bg-blue-700 sm:py-4">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>