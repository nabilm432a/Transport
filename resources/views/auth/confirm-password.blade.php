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
        <div style="margin-left: 9rem"><h1>Update Passport</h1></div>
    </div>
    </br></br>
    <div style="display: flex; justify-content: center; align-items: start; padding-bottom: .5rem; flex-direction: column; margin-left: 20px">
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 40%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39);">
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <label for="password">Enter your current Password:</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </br>
                <button class="group relative h-15 w-32 overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300" type="submit">
                    <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Submit</span>
                </button>
            </form>
        </div>

    </div>
@endsection

</body>
</html>
