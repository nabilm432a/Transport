@extends('layouts.app')
<title>Dashboard</title>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
    <div>
        @section('header')

        @endsection

        @section('main')

                <div class="text-white" style="background-color: #2d3748">
                    <div style="margin-left: 9rem"><h1>This is the Dashboard</h1></div>
                </div>
                @if(!auth()->user()->passport && !auth()->user()->contact)
                    <p style="color: yellow">Welcome, you are signed up through google, so you need to enter your passport no. and contact in your profile screen</p>
                @elseif(!auth()->user()->passport)
                    <p style="color: yellow">Your Passport has not been added to your account yet</p>
                @elseif(!auth()->user()->contact)
                    <p style="color: yellow">Your Contact has not been added to your account yet</p>
                @endif
        @endsection

        @section('footer')

        @endsection
    </div>
</body>

