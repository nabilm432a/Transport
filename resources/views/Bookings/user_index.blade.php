@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')

@endsection
@section('main')
    <div class="text-white" style="background-color: #2d3748">
        <div style="margin-left: 9rem"><h1></h1></div>
    </div>
    <div style="margin-top: 5px">
        <a href="{{route('user.book')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Add</button></a>
    </div>
    <div style="margin-top: 5px">
        <a href="{{route('user-panel')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Back</button></a>
    </div>
    <div>
        @if(session('message'))
            <p class="text-white">{{session('message')}}</p>
        @endif
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" style="text-align: center;">ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Transport Mode</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Route</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Departure Port</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Arrival Port</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Departure Time</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Arrival Time</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Number of Seats</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Book</th>
            </tr>
            </thead>
            <tbody>
            @foreach($travels as $travel)
                <tr class="bg-gray-100">
                    <td style="text-align: center;">{{$travel->id}}</td>
                    <td style="text-align: center;">{{$travel->transport_mode}}</td>
                    <td style="text-align: center;">
                        @if($travel->transport_mode === 'bus' && $travel->bus)
                            {{ $travel->bus->license_number }}
                        @elseif($travel->transport_mode === 'airplane' && $travel->airplane)
                            {{ $travel->airplane->license_number }}
                        @elseif($travel->transport_mode === 'rail' && $travel->rail)
                            {{ $travel->rail->license_number }}
                        @endif
                    </td>
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
                    <td style="text-align: center;">{{$travel->departure_time}}</td>
                    <td style="text-align: center;">{{$travel->arrival_time}}</td>

                    <td style="text-align: center;">{{$Seats->number_of_seats}}</td>
                    <td style="text-align: center;">
                        <a href="{{route('travels.Book', $travel)}}" style="color: white;background-color: #9ca3af; padding: 0.4rem">Book</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
</body>
</html>
