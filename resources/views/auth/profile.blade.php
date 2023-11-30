@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')

@endsection
@section('main')
    <div class="text-white" style="background-color: #2d3748">
        <div style="margin-left: 9rem"><h1>This your profile</h1></div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 80%; height: 90%; padding: 1rem;background-color: rgb(17, 24, 39);">
            @auth
                <p>Name: {{auth()->user()->name}}</p>
                </br>
                <p>Email: {{auth()->user()->email}}</p>
                </br>
                <p>Contact: {{auth()->user()->contact}}</p>
                </br>
                <p>Passport: {{auth()->user()->passport}}</p>
                </br>
                <p>National ID: {{auth()->user()->nid}}</p>
                </br>
                <a href="{{route('edit-profile')}}">
                    <button class="group relative h-8 w-32 overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300">
                        <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                        <span class="relative text-black group-hover:text-white">Update Info</span>
                    </button>
                </a>

            @endauth
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 80%; height: 90%; padding: 1rem; background-color: rgb(17, 24, 39)">
            @auth
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-2xl ">Travel <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Profile</mark></h1>
                </br>
                @foreach($travelhistory as $travel)
                    @if($travel->travel->transport_mode == 'bus')
                        <p>{{$travel->travel->departureBusStop->name}} to {{$travel->travel->arrivalBusStop->name}} || Price: {{$travel->final_price}} || Payment: {{$travel->payment_status}}</p>
                    @elseif($travel->travel->transport_mode == 'airplane')
                        <p>{{$travel->travel->departureAirport->name}} to {{$travel->travel->arrivalAirport->name}} || Price: {{$travel->final_price}} || Payment: {{$travel->payment_status}}</p>
                    @elseif($travel->travel->transport_mode == 'rail')
                        <p>{{$travel->travel->departureRailstation->name}} to {{$travel->travel->arrivalRailstation->name}} || Price: {{$travel->final_price}} || Payment: {{$travel->payment_status}}</p>
                    @endif
                @endforeach
            @endauth
        </div>
    </div>
@endsection
</body>
</html>
