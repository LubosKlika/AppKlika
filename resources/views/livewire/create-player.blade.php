<div>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top: 150px">
        <div class="w-1/2 mx-auto">
            

            @if (session()->has('message'))
     
     


                <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">    {{ session('message') }}</div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            @endif


            <form wire:submit.prevent="savePlayer">
                <div class="mb-6">
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setPlayerName')</label>
                @error('name') <span class="error">{{ $message }}</span> @enderror
                <input type="text" wire:model.defer="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Peter Doe" required>
                </div>
                <div class="mb-6">
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setMobile')</label>
                @error('mobile') <span class="error">{{ $message }}</span> @enderror
                <input type="mobile" wire:model.defer="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+420 222 222 222" required>
                </div>
                <div class="mb-6">
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setCity')</label>
                @error('city') <span class="error">{{ $message }}</span> @enderror
                <input type="text" wire:model.defer="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Prague" required>
                </div>
                <div class="mb-6">
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setCountry')</label>
                @error('country') <span class="error">{{ $message }}</span> @enderror
                <input type="text" wire:model.defer="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="CZ" required>
                </div>
                
                <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setClub')</label>
                @error('club_id') <span class="error">{{ $message }}</span> @enderror
                    <select  wire:model="club_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">@lang('messages.setClubName')</option>
                        @foreach($clubs as $club)
                        
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                
                        @endforeach
                </select>  
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang('messages.submit')</button>
               
             </form>
        </div>

    </div>
</div>
