@extends('layouts.app')
<title>Booking</title>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
<div>
    @section('header')

    @endsection

    @section('main')

        <div class="text-white" style="background-color: #2d3748">
            <div style="margin-left: 9rem"><h1>Booking</h1></div>
        </div>
        <div style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; background-color: rgb(17, 24, 39);">
            @if(!auth()->user()->is_admin)
                @if(!auth()->user()->nid && !auth()->user()->contact)
                    <p style="color: yellow; margin-left: 5px; margin-top: 5px">Welcome, you are signed up through Google, so you need to enter your NID no. and contact in your profile screen</p>
                @elseif(!auth()->user()->nid)
                    <p style="color: yellow; margin-left: 5px; margin-top: 5px">Your NID has not been added to your account yet</p>
                @elseif(!auth()->user()->contact)
                    <p style="color: yellow; margin-left: 5px; margin-top: 5px">Your Contact has not been added to your account yet</p>
                @endif
            @endif
        </div>


        @if(!auth()->user()->is_admin)
            <div class="text-white" style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 100%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39);">
                <div style="padding: 0.5rem; background-color: rgb(50, 29, 39); border-radius: 8px">
                    <p>Booking</p>
                </div>
                </br>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">ID</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Transport Mode</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Route</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Departure Port</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Arrival Port</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Fare</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Departure Time</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Arrival Time</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Booked Seats</th>
                            <th scope="col" class="px-6 py-3" style="text-align: center;">Booking</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($travels as $travel)
                            <tr class="bg-gray-100">
                                <td style="text-align: center;">{{$travel->id}}</td>
                                <td style="text-align: center;">{{$travel->transport_mode}}</td>
                                <td style="text-align: center;">
                                    @if($travel->transport_mode === 'bus' && $travel->busRoute)
                                        {{ $travel->busRoute->sourceBusStop->location->city . ' to ' .  $travel->busRoute->destinationBusStop->location->city}}
                                    @elseif($travel->transport_mode === 'airplane' && $travel->airRoute)
                                        {{ $travel->airRoute->sourceAirport->location->city . ' to ' .  $travel->airRoute->destinationAirport->location->city}}
                                    @elseif($travel->transport_mode === 'rail' && $travel->railRoute)
                                        {{ $travel->railRoute->sourceRailstation->location->city . ' to ' .  $travel->railRoute->destinationRailstation->location->city}}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($travel->transport_mode === 'bus' && $travel->departureBusStop)
                                        {{ $travel->departureBusStop->name }}
                                    @elseif($travel->transport_mode === 'airplane' && $travel->departureAirport)
                                        {{ $travel->departureAirport->name }}
                                    @elseif($travel->transport_mode === 'rail' && $travel->departureRailstation)
                                        {{ $travel->departureRailstation->name }}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($travel->transport_mode === 'bus' && $travel->arrivalBusStop)
                                        {{ $travel->arrivalBusStop->name }}
                                    @elseif($travel->transport_mode === 'airplane' && $travel->arrivalAirport)
                                        {{ $travel->arrivalAirport->name }}
                                    @elseif($travel->transport_mode === 'rail' && $travel->arrivalRailstation)
                                        {{ $travel->arrivalRailstation->name }}
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($travel->transport_mode === 'bus' && $travel->arrivalBusStop)
                                        {{ $travel-> busRoute->fare }}
                                    @elseif($travel->transport_mode === 'airplane' && $travel->arrivalAirport)
                                        {{  $travel-> airRoute->fare }}
                                    @elseif($travel->transport_mode === 'rail' && $travel->arrivalRailstation)
                                        {{  $travel-> railRoute->fare }}
                                    @endif
                                </td>
                                <td style="text-align: center;">{{$travel->departure_time}}</td>
                                <td style="text-align: center;">{{$travel->arrival_time}}</td>

                                <td style="text-align: center;">{{$travel->booked_seats}}</td>
                                <td style="text-align: center;">
                                    <a href="{{route('ticketbook', $travel)}}" style="color: white;background-color: #9ca3af; padding: 0.4rem">Book</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        @endif
    @endsection


    @section('footer')

    @endsection
</div>
</body>


