@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')

@endsection
@section('main')
    <div class="text-white" style="background-color: #2d3748">
        <div style="margin-left: 9rem"><h1></h1></div>
    </div>
    <div style="margin-top: 5px">
        <a href="{{route('travels.create')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Add</button></a>
    </div>
    <div style="margin-top: 5px">
        <a href="{{route('admin-panel')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Back</button></a>
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
                <th scope="col" class="px-6 py-3" style="text-align: center;">Vehicle ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Route ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Departure Port ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Arrival Port ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Departure Time</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Arrival Time</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Seats Available</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Actions</th>
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
                            {{ $travel->busRoute->source_location->city . ' to ' .  $travel->busRoute->destination_location->city}}
                        @elseif($travel->transport_mode === 'airplane' && $travel->airRoute)
                            {{ $travel->busRoute->source_location->city . ' to ' .  $travel->busRoute->destination_location->city}}
                        @elseif($travel->transport_mode === 'rail' && $travel->railRoute)
                            {{ $travel->busRoute->source_location->city . ' to ' .  $travel->busRoute->destination_location->city}}
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
                    <td style="text-align: center;">{{$travel->available_seats}}</td>
                    <td style="text-align: center;">
                        <a href="{{route('travels.edit', $travel)}}" style="color: white;background-color: #9ca3af; padding: 0.4rem">Edit</a>
                        <form style="display: inline-block;color: white; background-color: #9ca3af; padding: 0.3rem" method="POST" action="{{route('travels.destroy', $travel)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
</body>
</html>
