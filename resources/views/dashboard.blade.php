@extends('layouts.app')
<title>Dashboard</title>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
    <div>
        @section('header')

        @endsection

        @section('main')

                <div class="text-white" style="background-color: #2d3748">
                    <div style="margin-left: 9rem"><h1>Dashboard</h1></div>
                </div>
                @if(!auth()->user()->is_admin)
                    @if(!auth()->user()->passport && !auth()->user()->contact)
                    <div style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; height: 5%; background-color: rgb(17, 24, 39);">
                        <p style="color: yellow; margin-left: 5px; margin-top: 5px">Welcome, you are signed up through google, so you need to enter your passport no. and contact in your profile screen</p>
                    </div>
                    @elseif(!auth()->user()->passport)
                    <div style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; height: 5%; background-color: rgb(17, 24, 39);">
                        <p style="color: yellow; margin-left: 5px; margin-top: 5px">Your Passport has not been added to your account yet</p>
                    </div>
                    @elseif(!auth()->user()->contact)
                    <div style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; height: 5%; background-color: rgb(17, 24, 39);">
                        <p style="color: yellow; margin-left: 5px; margin-top: 5px">Your Contact has not been added to your account yet</p>
                    </div>
                    @endif
                @endif
        @if(!auth()->user()->is_admin)
            <div class="text-white" style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39);">
                <div style="padding: 0.5rem; background-color: rgb(50, 29, 39); border-radius: 8px">
                    <p>Notice Board</p>
                </div>
                </br>
                <div style="background-color: #a0aec0">
                    <p>AAAAAAAA</p>
                </div>
            </div>
        @endif
        @endsection


        @section('footer')

        @endsection
    </div>
</body>

