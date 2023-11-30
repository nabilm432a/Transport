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
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem;">
        <div class="text-white w-1/3" style="margin-top: 100px; border-radius: 8px; height: 90%; padding: 3rem;background-color: rgb(17, 24, 39);">
            <div style="margin-bottom: 10px; background-color: rgb(45, 55, 72); border-radius: 8px">
                <h2 class="mb-2 ml-2 mt-0 text-2xl font-medium leading-tight text-primary"></h2>
            </div>
            <h1 class="text-4xl font-extrabold dark:text-white">Travelling by {{$transport_mode}}</h1>
            </br>
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <form method="POST" action="{{route('travelhistories.store')}}" style="border: 2px solid;padding: 1.5rem; border-radius: 8px; margin-bottom: 5px">
                    @csrf
                    <input type="hidden" id="transport_mode" name="transport_mode" value="{{$transport_mode}}">
                    <input type="hidden" id="user_id" name="user_id" value="{{auth()->id()}}">

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="travel_id">
                                Travelling route
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select class="text-black" name="travel_id" id="travel_id">
                                @if($transport_mode == 'bus')
                                    @foreach($travels as $travel)
                                        <option class="text-black" value="{{$travel->id}}">{{$travel->departureBusStop->name}} to {{$travel->arrivalBusStop->name}}</option>
                                    @endforeach
                                @elseif($transport_mode == 'airplane')
                                    @foreach($travels as $travel)
                                        <option class="text-black" value="{{$travel->id}}">{{$travel->departureAirport->name}} to {{$travel->arrivalAirport->name}}</option>
                                    @endforeach
                                @elseif($transport_mode == 'rail')
                                    @foreach($travels as $travel)
                                        <option class="text-black" value="{{$travel->id}}">{{$travel->departureRailstation->name}} to {{$travel->arrivalRailstation->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div style="margin-top: 5px">
                        <button type="submit" class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Add</button>
                    </div>
                </form>

            </div>


            <div>
                <a href="{{route('transport-mode-form')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Back</button></a>
            </div>
        </div>

        <div class="text-white w-1/3" style="margin-left:20px;margin-top: 100px; border-radius: 8px; height: 90%; padding: 3rem;background-color: rgb(17, 24, 39);">
            @if($transport_mode == 'bus')
                @foreach($travels as $travel)
                    <p>{{$travel->departureBusStop->name}} to {{$travel->arrivalBusStop->name}} || Price: {{$travel->busRoute->fare}} || Available Seats: {{$travel->total_seats - $travel->booked_seats}}</p>
                @endforeach
            @elseif($transport_mode == 'airplane')
                @foreach($travels as $travel)
                    <p>{{$travel->departureAirport->name}} to {{$travel->arrivalAirport->name}} || Price: {{$travel->airRoute->fare}} || Available Seats: {{$travel->total_seats - $travel->booked_seats}}</p>
                @endforeach
            @elseif($transport_mode == 'rail')
                @foreach($travels as $travel)
                    <p>{{$travel->departureRailstation->name}} to {{$travel->arrivalRailstation->name}} || Price: {{$travel->railRoute->fare}} || Available Seats: {{$travel->total_seats - $travel->booked_seats}}</p>
                @endforeach
            @endif
        </div>
    </div>
@endsection
</body>
</html>
