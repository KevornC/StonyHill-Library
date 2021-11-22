<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="px-6 py-5 font-semibold text-gray-700 bg-gray-200 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Update Book') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('APIbookupdated') }}">
                    @csrf
                    <input type="hidden" value="{{$book['id']}}" name='id'>
                    <div class="flex flex-wrap">
                        <label for="name" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                            {{ __('Book Name') }}:
                        </label>

                        <input id="name" type="text" value="{{$book['book_nm']}}"
                            class="form-input w-full @error('book_name') border-red-500 @enderror" name="book_name"
                            required>

                        @error('name')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="book_color" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="book_color" type="book_color"
                            class="form-input w-full @error('book_color') border-red-500 @enderror" name="book_color"
                            value="{{$book['book_color'] }}" required autocomplete="book_color" autofocus>

                        @error('book_color')
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