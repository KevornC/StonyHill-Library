<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div>
        @if ($editmode===true)
        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="update" autocomplete="off">
            {{-- @csrf --}}
            
            @if($successMsg=="Failed")
            <div class="p-4 mt-8 rounded-md bg-red-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium leading-5 text-red-800">
                            {{ $successMsg }}
                        </p>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('successMsg', null)"
                                class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition ease-in-out duration-150"
                                aria-label="Dismiss">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex flex-wrap">
                <label for="member_id" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Member Name') }}:
                </label>

                
                <select class="form-input w-full @error('member_id')  border-red-500 @enderror" wire:model="member_id">
                    <option value="">Select a Member</option>
                    @forelse ($members as $member)
                        <option value="{{$member->id}}">{{$member->name}}</option>
                    @empty   
                        <option value="">***NOT AVAILABLE***</option>
                    @endforelse
                </select>

                @error('member_id')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            
            <div class="flex flex-wrap">
                <label for="book_id" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Book Name') }}:
                </label>

                <select class="form-input w-full @error('book_id')  border-red-500 @enderror" wire:model="book_id">
                    <option value="">Select a Member</option>
                    @forelse ($books as $book)
                        <option value="{{$book->id}}">{{$member->book_nm}}</option>
                    @empty   
                        <option value="">***NOT AVAILABLE***</option>
                    @endforelse
                </select>
                @error('book_id')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            
            <div class="flex flex-wrap">
                <label for="issued_date" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                    {{ __('Issued Date') }}:
                </label>

                <input id="issued_date" type="date" class="form-input w-full @error('issued_date')  border-red-500 @enderror"
                wire:model="issued_date" autofocus>

                @error('issued_date')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>


            <div class="flex flex-wrap justify-center w-full align-items-center">
                <button type="submit"
                class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                <svg wire:loading wire:target="update" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Edit</span>
            </button>

            </div>
        </form>

        @elseif ($addmode===true)
        <a class="hover:bg-cool-gray-600 hover:text-yellow-400" href="" wire:click.prevent="view()">View Issued Books</a>
            <div>
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" wire:submit.prevent="Onsubmit" autocomplete="off">
                        {{-- @csrf --}}
                        
                        @if($successMsg=="Failed")
                        <div class="p-4 mt-8 rounded-md bg-red-50">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium leading-5 text-red-800">
                                        {{ $successMsg }}
                                    </p>
                                </div>
                                <div class="pl-3 ml-auto">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button
                                            type="button"
                                            wire:click="$set('successMsg', null)"
                                            class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition ease-in-out duration-150"
                                            aria-label="Dismiss">
                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="flex flex-wrap">
                            <label for="member_id" class="block mt-8 mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                {{ __('Member Name') }}:
                            </label>
            
                            
                            <select class="form-input w-full @error('member_id')  border-red-500 @enderror" wire:model="member_id">
                                <option value="">Select a Member</option>
                                @forelse ($members as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                @empty   
                                    <option value="">***NOT AVAILABLE***</option>
                                @endforelse
                            </select>
            
                            @error('member_id')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div class="flex flex-wrap">
                            <label for="book_id" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                {{ __('Book Name') }}:
                            </label>
            
                            <select class="form-input w-full @error('book_id')  border-red-500 @enderror" wire:model="book_id">
                                <option value="">Select a Book</option>
                                @if(sizeof($books)==0)
                                <option value="">***NOT AVAILABLE***</option>
                                @else
                                @foreach ($books as $book)
                                    @if($book->book_quantity!=0)
                                    <option value="{{$book->id}}">{{$book->book_nm}}</option>
                                    @else
                                    <option value="">***BOOK OUT OF STOCK***</option>
                                    @endif   
                                @endforeach
                                @endif
                            </select>
                            @error('book_id')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div class="flex flex-wrap">
                            <label for="issued_date" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4">
                                {{ __('Issued Date') }}:
                            </label>
            
                            <input id="issued_date" type="date" class="form-input w-full @error('issued_date')  border-red-500 @enderror"
                            wire:model="issued_date" autofocus>
            
                            @error('issued_date')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                                    
                        <div class="flex flex-wrap justify-center w-full align-items-center">
                            <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 disabled:opacity-50">
                            <svg wire:loading wire:target="Onsubmit" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Add</span>
                        </button>
          
                        </div>
                    </form>
            </div>
    
                    @elseif($addmode===false)
                    @include('livewire.displayissuedbooks')
                    @endif
                    {{-- @endif
                    @endif --}}
    
    </div>
    <div class="w-full">
        {{-- {{$issuedbooks->links()}} --}}
    </div>
</div>
