@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')

@endsection

@section('main')
    <div class="text-white" style="background-color: #2d3748">
        <div style="margin-left: 9rem"><h1>Home</h1></div>
    </div>
    <div style="margin-top: 5px">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">Travel to your Heart's Content</h1>
    </div>
    <div style="padding: 0.5rem; margin-top: 10px; display: flex;">

        <div style="padding: 4rem; width: 50%; height: 80%; background-color: #2d3748; border-radius: 8px">
            <div>
                @guest
                    <a class="mb-3 flex justify-center rounded bg-amber-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                        href="{{route('transport-mode-form')}}"
                        role="button"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        &nbsp;&nbsp;Book A Ticket
                    </a>
                @endguest
                @auth
                    <a class="mb-3 flex justify-center rounded bg-amber-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                       href="{{route('transport-mode-form')}}"
                       role="button"
                       data-te-ripple-init
                       data-te-ripple-color="light">
                        &nbsp;&nbsp;Book A Ticket
                    </a>
                    @if(!auth()->user()->is_admin)
                        <a class="mb-3 flex justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                           href="{{route('profile')}}"
                           role="button"
                           data-te-ripple-init
                           data-te-ripple-color="light">
                            &nbsp;&nbsp;View your Profile
                        </a>
                        <a class="mb-3 flex justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                           href="{{route('dashboard')}}"
                           role="button"
                           data-te-ripple-init
                           data-te-ripple-color="light">
                            &nbsp;&nbsp;Dashboard
                        </a>
                    @elseif (auth()->user()->is_admin)
                            <a class="mb-3 flex justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                               href="{{route('admin-panel')}}"
                               role="button"
                               data-te-ripple-init
                               data-te-ripple-color="light">
                                &nbsp;&nbsp;Admin Panel
                            </a>
                    @endif
                @else
                    <a class="mb-3 flex justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                       href="{{route('login')}}"
                       role="button"
                       data-te-ripple-init
                       data-te-ripple-color="light">
                        &nbsp;&nbsp;Login
                    </a>
                    <a class="mb-3 flex justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                       href="{{route('register')}}"
                       role="button"
                       data-te-ripple-init
                       data-te-ripple-color="light">
                        &nbsp;&nbsp;Register
                    </a>
                @endauth

            </div>
        </div>
        <div style="width: 50%; margin-left: 10px; height: 70%">
            <img
                src="{{asset('images/stockp.jpg')}}"
                class="w-full rounded-md opacity-100 transition duration-300 ease-in-out hover:opacity-70"
                alt="Phone image" />
        </div>
    </div>
@endsection

@section('footer')

@endsection
</body>
</html>
