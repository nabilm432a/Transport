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
                <div style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; background-color: rgb(17, 24, 39);">
                    @if(!auth()->user()->is_admin)
                        @if(!auth()->user()->nid && !auth()->user()->contact)
                            <p style="color: yellow; margin-left: 5px; margin-top: 5px">Welcome, you are signed up through Google, so you need to enter your NID no. and contact in your profile screen</p>
                        @elseif(!auth()->user()->nid)
                            <p style="color: yellow; margin-left: 5px; margin-top: 5px">Your NID has not been added to your account yet</p>
                        @elseif(!auth()->user()->contact)
                            <p style="color: yellow; margin-left: 5px; margin-top: 5px">Your Contact has not been added to your account yet</p>
                        @endif
                    @endif
                </div>


        @if(!auth()->user()->is_admin)
            <div class="text-white" style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 40%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39);">
                <div style="padding: 0.5rem; background-color: rgb(50, 29, 39); border-radius: 8px">
                    <p>Notice Board</p>
                </div>
                </br>
                @foreach($notices as $notice)
                <div style="background-color: #a0aec0; border-radius: 8px">
                    <h2>{{$notice->title}}</h2>
                    <p>{{$notice->description}}</p>
                </div>
                </br>
                @endforeach
            </div>
        @endif
        @endsection


        @section('footer')

        @endsection
    </div>
</body>

