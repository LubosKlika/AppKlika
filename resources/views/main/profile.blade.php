@extends('layout.layout')



@section('content')






<div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top:150px; margin-bottom:250px">
    <div>

        <div class="bg-white relative shadow rounded-lg w-2/3 mx-auto">

        
            <div class="mt-16">
                    @livewire('players', ['player' => $player])
                    
                
                <p>
                    <span>
                        
                    </span>
                </p>
      
          
                <div class="flex justify-between items-center my-5 px-6">
                    <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        @if ($player->total_wins <= 1) 
                        {{$player->total_matches}} @lang('messages.match')</a>
                        @else
                        {{$player->total_matches}} @lang('messages.matches')</a>
                        @endif
                    <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        @if ($player->total_wins <= 1) 
                        {{$player->total_wins}}   @lang('messages.win')</a>
                        @else
                        {{$player->total_wins}}   @lang('messages.wins')</a>
                        @endif
                    <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        @if ($player->total_losses <= 1) 
                        {{$player->total_losses}} @lang('messages.loss')</a>
                        @else
                        {{$player->total_losses}} @lang('messages.losses')</a>
                        @endif
                      
                    <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        @if ($player->total_draws<= 1) 
                        {{$player->total_draws}} @lang('messages.draw')</a>
                        @else
                        {{$player->total_draws}} @lang('messages.draws')</a>
                        @endif
                       
                
                </div>
                <div class="flex justify-between items-center my-5 px-6">
                    <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        {{ $player->win_lose_ratio }} @lang('messages.wlTotal')</a>
                    <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        {{ $player->win_white_ratio }} @lang('messages.wlWhite')</a>
                        <a  class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                            {{ $player->win_black_ratio }} @lang('messages.wlBlack')</a>
                      

                
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="w-full">
                    <h3 class="font-medium text-gray-900 text-left px-6 text-center py-3">@lang('messages.bestMatch')</h3>
                    <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">

                        
                   
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                       @lang('messages.opponent')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('messages.result')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('messages.figures')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('messages.moves')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('messages.date')
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                               @if ($player->best_match)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($player->best_match->white_id == $player->id)
                                        <a href="{{$player->best_match->player2->id}}"> {{ $player->best_match->player2->name }}</a>
                                        @else
                                 
                                            <a href="{{$player->best_match->player1->id}}"> {{ $player->best_match->player1->name }}</a>
                                        @endif
                                    </th>

                                    <td class="px-6 py-4">
                                        @if($player->best_match->winner_id == $player->id)
                                        <button type="button" class="
                                        focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        @lang('messages.win')
                                        </button>
                                        @elseif($player->best_match->loser_id == $player->id)
                                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> @lang('messages.loss')</button>
                                        @elseif($player->best_match->winner_id == 0 && $player->best_match->loser_id == 0)
                                        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"> @lang('messages.draw')</button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 ">
                                        @if ($player->best_match->white_id == $player->id)
                                        
                                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                           @lang('messages.setWhite')
                                        </button>
                                        @else 
                                        <button type="button" class="  text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                            @lang('messages.setBlack')
                                        </button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $player->best_match->moves }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date('d.m.Y H:i', strtotime($player->best_match->date)) }} 
                                    </td>
                                </tr>
                                @else
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                    @lang('messages.noData')
                                </tr>
                                @endif
                            </tbody>
                        </table>
                 


                        
                    </div>
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="w-full">
                    <h3 class="font-medium text-gray-900 text-left px-6 text-center py-3">    @lang('messages.record')</h3>
                    <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">

                        
                   
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        @lang('messages.opponent')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    
                                        @lang('messages.result')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    
                                        @lang('messages.figures')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    
                                        @lang('messages.moves')
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                 
                                        @lang('messages.date')
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentMatches as $match)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      @if ($match->white_id == $player->id)
                                      <a href="{{$match->player2->id}}">
                                        {{ $match->player2->name }}
                                    </a>
                                        @else
                                        <a href="{{$match->player1->id}}">
                                            {{ $match->player1->name }}
                                        </a>
                                        @endif
                                     
                                    </th>

                                    <td class="px-6 py-4">
                                        @if($match->winner_id == $player->id)
                                        <button type="button" class="
                                        focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        @lang('messages.win')
                                        </button>
                                        @elseif($match->loser_id == $player->id)
                                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> @lang('messages.loss')</button>
                                        @elseif($match->winner_id == 0 && $match->loser_id == 0)
                                        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"> @lang('messages.draw')</button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 ">
                                        @if ($match->white_id == $player->id)
                                        
                                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            @lang('messages.setWhite')
                                        </button>
                                        @else 
                                        <button type="button" class="  text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                            @lang('messages.setBlack')
                                        </button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $match->moves }}
                                    </td>
                                    <td class="px-6 py-4">
                                       
                                        {{ date("d.m.Y H:i", strtotime($match->date)) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                 
                        {{ $recentMatches->links() }}

                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection