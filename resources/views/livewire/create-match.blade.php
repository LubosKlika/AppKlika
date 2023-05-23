<div>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top: 150px">
        <div class="w-1/2 mx-auto">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
      
        
        
        
        
        
        
        
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
            <form wire:submit.prevent="saveMatch">
                <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setPlayerWhite')</label>
                @error('white_id') <span class="error">{{ $message }}</span> @enderror
                    <select required  wire:model="white_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected="selected">@lang('messages.setPlayer')</option>
                            @foreach($players as $player)
                               
                                    <option value="{{ $player->id }}"@if($black_id == $player->id) disabled style="font-weight:800" @endif >{{ $player->name }}</option>
                     
                            @endforeach
                    </select>  
                </div>
                @if(!is_null($white_id) && $white_id != '')
                <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setPlayerBlack')</label>
                @error('black_id') <span class="error">{{ $message }}</span> @enderror
                    <select required wire:model="black_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected="selected">@lang('messages.setPlayer')</option>
                        @foreach($players as $player)
                        
                                <option value="{{ $player->id }} "@if($white_id == $player->id) disabled style="font-weight:800" @endif>{{ $player->name }}</option>
                
                        @endforeach
                </select>  
                </div>
                <div class="mb-6">
                    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setMoves')</label>
                    @error('moves') <span class="error">{{ $message }}</span> @enderror
                    <input wire:model.defer="moves" type="number" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="25" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('messages.setWon')</label>
                    @error('color_id') <span class="error">{{ $message }}</span> @enderror
                        <select required wire:model="color_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           
                        
                            <option value="" selected="selected">@lang('messages.setPlayerDraw')</option>
                                    <option value="1">@lang('messages.setWhite')</option>
                                    <option value="2">@lang('messages.setBlack')</option>
                                    <option value="0">@lang('messages.setDraw')</option>
                  
                    </select>  
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang('messages.submit')</button>
                @endif
             </form>
        </div>

    </div>
</div>
