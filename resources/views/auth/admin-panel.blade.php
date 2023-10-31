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
                <a href="#">
                    <button class="group relative h-8 w-32 overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300">
                        <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                        <span class="relative text-black group-hover:text-white">Update Info</span>
                    </button>
                </a>
            @endauth
        </div>
    </div>
@endsection
</body>
</html>
