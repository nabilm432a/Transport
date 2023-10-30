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
        <div style="margin-left: 9rem"><h1>Admin Panel</h1></div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 80%; height: 90%; padding: 1rem;background-color: rgb(17, 24, 39);">
            @auth
                <p>Name: {{auth()->user()->name}}</p>
                </br>
                <p>Email: {{auth()->user()->email}}</p>
                </br>
                <p>Status: {{auth()->user()->is_admin}}</p>
                </br>
                <a href="#"><button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Update Info</button></a>

            @endauth
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 80%; height: 90%; padding: 1rem; background-color: rgb(17, 24, 39)">
            @auth
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-2xl ">Travel <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Profile</mark></h1>
                <p>Here you will see all the places you travelled</p>
                </br></br></br>

            @endauth
        </div>
    </div>
@endsection
</body>
</html>