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
        <a href="{{route('airroutes.create')}}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Add</button></a>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" style="text-align: center;">ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Source_ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Destination_ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($airroutes as $airroute) <!--Change these-->
                <tr class="bg-gray-100">
                    <td style="text-align: center;">{{$airroute->id}}</td>
                    <td style="text-align: center;">{{$airroute->source_location->id}}</td>
                    <td style="text-align: center;">{{$airroute->destination_location->id}}</td>
                    <td style="text-align: center;">
                        <a href="{{route('airroutes.edit', $airroute)}}" style="color: white;background-color: #9ca3af; padding: 0.4rem">Edit</a>
                        <form style="display: inline-block;color: white; background-color: #9ca3af; padding: 0.3rem" method="POST" action="{{route('airroutes.destroy', $airroute)}}">
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
