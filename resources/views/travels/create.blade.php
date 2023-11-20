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
        <div class="text-white" style="width: 40%;margin-top: 100px; border-radius: 8px; height: 90%; padding: 3rem;background-color: rgb(17, 24, 39);">
            <div style="margin-bottom: 10px; background-color: rgb(45, 55, 72); border-radius: 8px">
                <h2 class="mb-2 ml-2 mt-0 text-2xl font-medium leading-tight text-primary">Add a Travel option</h2>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <form method="POST" action="{{route('travels.store')}}">
                    @csrf

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="transport_mode">
                                Transport Mode:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select class="text-black" name="transport_mode" id="transport_mode" required>
                                <option class="text-black" value="bus" >Bus</option>
                                <option class="text-black" value="airplane">Airplane</option>
                                <option class="text-black" value="rail">Rail</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="departure_time">
                                Departure Time:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="departure_time" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="departure_time" type="datetime-local">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="arrival_time">
                                Arrival Time:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="arrival_time" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="arrival_time" type="datetime-local">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="bus_id">
                                Bus ID:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="bus_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="bus_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="bus_route_id">
                                Bus Route ID:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="bus_route_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="bus_route_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="departure_bus_stop_id">
                                Departure Bus Stop:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="departure_bus_stop_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="departure_bus_stop_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="arrival_bus_stop_id">
                                Arrival Bus Stop:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="arrival_bus_stop_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="arrival_bus_stop_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="airplane_id">
                                Airplane ID:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="airplane_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="airplane_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="air_route_id">
                                Airplane Route ID:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="air_route_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="air_route_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="departure_airport_id">
                                Departure Airport:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="departure_airport_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="departure_airport_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="arrival_airport_id">
                                Arrival Airport:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="arrival_airport_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="arrival_airport_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="rail_id">
                                Rail ID:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="rail_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="rail_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="rail_route_id">
                                Rail Route ID:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="rail_route_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="rail_route_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="departure_railstation_id">
                                Departure Rail Station:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="departure_railstation_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="departure_railstation_id" type="number">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="arrival_railstation_id">
                                Arrival Rail Station:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input id="arrival_railstation_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="arrival_railstation_id" type="number">
                        </div>
                    </div>


                    <div style="margin-top: 5px">
                        <button type="submit" class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Add</button>
                    </div>
                </form>

            </div>
            <div>
                @if(session('message'))
                    <p class="text-white">{{session('message')}}</p>
                @endif
            </div>
            <div>
                <a href="{{route('travels.index')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Back</button></a>
            </div>
        </div>
    </div>
@endsection
</body>
</html>