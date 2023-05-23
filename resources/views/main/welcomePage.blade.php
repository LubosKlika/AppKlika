@extends('layout.layout')



@section('content')

<div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top: 100px">
    <h6 class="text-lg font-bold dark:text-white"> @lang('messages.github')</h6>
    <h6 class="text-lg font-bold dark:text-white"> @lang('messages.info')</h6>
    <h6 class="text-lg font-bold dark:text-white mb-5"> @lang('messages.infoWeb')</h6>
   
    <h2 class="text-center text-4xl font-extrabold dark:text-white mb-4 pt-5">@lang('messages.mainh1')</h2>
    <h2 class="text-center text-4xl font-extrabold dark:text-white mb-4">@lang('messages.infoLeader')</h2>

     
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-center">  @lang('messages.ranking')</th>
                            <th scope="col" class="px-4 py-3">  @lang('messages.playerName')</th>
                            <th scope="col" class="px-4 py-3">  @lang('messages.club')</th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">
                                    @lang('messages.totalWins')
                                    
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">
                             
                                    @lang('messages.totalLosses')
                                    
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">
                                   
                                    @lang('messages.totalDraws')
                                    
                                </div>
                            </th>

                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">
                             
                                    @lang('messages.totalMatches')
                                    
                                </div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($topPlayers as $top)
                        <tr>

                         

                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"> {{ $loop->iteration }}.</th>
                            <td  class="px-4 py-3"> <a href="/profile/{{$top->id}}"><b><u>{{ $top->name}}</u></b></a></td>
                            <td class="px-4 py-3">   {{$top->club_name}}   </td>
                            <td class="px-4 py-3">     {{$top->total_wins}}    </td>
                            <td class="px-4 py-3">      {{$top->total_losses}}     </td>
                            <td class="px-4 py-3">     {{$top->total_draws}}    </td>
                            <td class="px-4 py-3">      {{$top->total_matches}}  </td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

      
  
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top: 50px">
      
            <h2 class="text-center text-4xl font-extrabold dark:text-white mb-4">@lang('messages.infoLeast')</h2>
      
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">@lang('messages.whiteFigures')</th>
                                <th scope="col" class="px-4 py-3">@lang('messages.whiteFiguresClub')</th>
                                <th scope="col" class="px-4 py-3">
                                  
                           
                                    @lang('messages.blackFigures')
                               
                                </th>
                                <th scope="col" class="px-4 py-3">
                                   
                                      
                                        @lang('messages.blackFiguresClub')
                             
                                </th>
                                <th scope="col" class="px-4 py-3">
                                   
                
                                       @lang('messages.moves')
                               
                                </th>
                                <th scope="col" class="px-4 py-3">
                                  
                               
                                     @lang('messages.winner')
                                  
                                </th>

                                <th scope="col" class="px-4 py-3">
                                  
                                </th>
                            </tr>
                        </thead>
                        <tbody>
    
    
                    
                            <tr>
                    
                            
                                
                              
                                <td class="px-4 py-3"><a href="profile/{{$leastMoves->Player1->id}}"><b><u>{{  $leastMoves->Player1->name }}</u></b></a></td>
                                <td class="px-4 py-3">  {{  $leastMoves->Player1->club->name }} </td>
                                <td class="px-4 py-3"><a href="profile/{{$leastMoves->Player2->id}}"><b><u>{{  $leastMoves->Player2->name }}</u></b></a></td>
                                <td class="px-4 py-3">{{  $leastMoves->Player2->club->name }}</td>
                                <td class="px-4 py-3"> {{ $leastMoves->moves }}  </td>
                                <td class="px-4 py-3">  @if($leastMoves->winner_id ==  $leastMoves->Player1->id)
                                    {{  $leastMoves->Player1->name }}
                                @else
                                    {{  $leastMoves->Player2->name }}

                             
                                @endif
                                </td>
                             
                 

                            </tr>
            
    
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top: 50px;margin-bottom:150px">
           
            <h2 class="text-center text-4xl font-extrabold dark:text-white mb-4">@lang('messages.infoMost')</h2>
       
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">@lang('messages.whiteFigures')</th>
                                <th scope="col" class="px-4 py-3">@lang('messages.whiteFiguresClub')</th>
                                <th scope="col" class="px-4 py-3">
                                  
                                    
                                    @lang('messages.blackFigures')
                               
                                </th>
                                <th scope="col" class="px-4 py-3">
                                   
                                 
                                        @lang('messages.blackFiguresClub')
                             
                                </th>
                                <th scope="col" class="px-4 py-3">
                                   
                                    @lang('messages.moves')
                                        
                               
                                </th>
                                <th scope="col" class="px-4 py-3">
                                  
                                    @lang('messages.winner')
                                        
                                  
                                </th>

                                <th scope="col" class="px-4 py-3">
                                  
                                </th>
                            </tr>
                        </thead>
                        <tbody>
    
    
                    
                            <tr>
                    
                            
                                
                              
                                <td class="px-4 py-3"><a href="profile/{{$mostMoves->Player1->id}}"><b><u>{{  $mostMoves->Player1->name }}</b></u></td>
                                <td class="px-4 py-3">  {{  $mostMoves->Player1->club->name }} </td>
                                <td class="px-4 py-3"><a href="profile/{{$mostMoves->Player2->id}}"><b><u>{{  $mostMoves->Player2->name }}</b></u></td>
                                <td class="px-4 py-3">{{  $mostMoves->Player2->club->name }}</td>
                                <td class="px-4 py-3"> {{ $mostMoves->moves }}  </td>
                                <td class="px-4 py-3">  @if($mostMoves->winner_id ==  $mostMoves->Player1->id)
                                    {{  $mostMoves->Player1->name }}
                                @else
                                    {{  $mostMoves->Player2->name }}

                             
                                @endif
                                </td>
                             
                 

                            </tr>
            
    
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    
@endsection