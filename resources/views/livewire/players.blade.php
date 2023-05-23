<div>


<div class="w-1/2 mx-auto">
    @if($editable)    
    <p class="text-center text-sm text-gray-400 font-medium"> 

        @lang('messages.currName') {{ $name }}
    </p>
    <h1 class="font-bold text-center text-3xl text-gray-900"><input type="text" wire:model.defer="name"></h1>

    <p class="text-center text-sm text-gray-400 font-medium"> 

    @lang('messages.currClub') {{$club}}
    </p>
        <select id="countries" wire:model.defer="club_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              
                @foreach($clubs as $club)
                    @if($club->id != $clubId) 
                        <option value="{{ $club->id }}" {{ $club->id == $club_id ? 'selected' : '' }}>{{ $club->name }}</option>
                    @endif
                @endforeach
        </select>    
    <p class="text-center text-sm text-gray-400 font-medium"> 
       
        @lang('messages.currCity') {{ $city }}
    </p>
    <p h1 class="font-bold text-center text-3xl text-gray-900"> <input type="text" wire:model.defer="city"></h1>
    <p class="text-center text-sm text-gray-400 font-medium"> 
  
        @lang('messages.currMobile') {{ $mobile }}
    </p>
    <p h1 class="font-bold text-center text-3xl text-gray-900"> <input type="text" wire:model.defer="mobile"></h1>
        @error('mobile') <span class="error">{{ $message }}</span> @enderror
    <p class="text-center text-sm text-gray-400 font-medium"> 
        
        @lang('messages.currCountry') {{ $country }}
    </p>
    <p h1 class="font-bold text-center text-3xl text-gray-900"><input type="text" wire:model.defer="country"></h1>

    
        
       


@else
<h1 class="font-bold text-center text-3xl text-gray-900">{{ $name }}</h1>
<p class="text-center text-sm text-gray-400 font-medium">{{{ $club}}}</p>
<p class="text-center text-sm text-gray-400 font-medium">{{{ $mobile}}}</p>
<p class="text-center text-sm text-gray-400 font-medium">{{ $city }}</p>
<p class="text-center text-sm text-gray-400 font-medium">{{ $country }}</p>
<p class="text-center text-sm text-gray-400 font-medium">
    @lang('messages.joinedClub')
    {{ date('d.m.Y H:i', strtotime($joined)) }}</p>
@endif
<div class="text-right">
<button  wire:click="toggleEdit" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ $editable ? 'Cancel' : 'Edit' }}</button>

@if($editable)

    <button wire:click="save" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">@lang('messages.save')</button>

@endif
</div>
</div>
</div>
