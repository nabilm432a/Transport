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
        <div style="margin-left: 9rem"><h1>Update Profile Information</h1></div>
    </div>
    <div style="display: flex; justify-content: center; align-items: start; padding-bottom: .5rem; flex-direction: column; margin-left: 20px">
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 40%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39); display: flex; flex-direction: column; align-items: flex-start;">
            <a href="{{route('update-passport')}}">
                <button style="padding: 1rem" class="group relative overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300">
                    <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Update Passport No.</span>
                </button>
            </a>
            <a href="{{route('update-nid')}}" style="margin-top: 10px">
                <button style="padding: 1rem" class="group relative overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300">
                    <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Update National ID no.</span>
                </button>
            </a>
            @if (!auth()->user()->google_id)
                <a href="{{route('password.confirm')}}" style="margin-top: 10px">
                    <button style="padding: 1rem" class="group relative overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300">
                        <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                        <span class="relative text-black group-hover:text-white">Update Password</span>
                    </button>
                </a>
            @endif
            <a href="{{route('update-contact')}}" style="margin-top: 10px">
                <button style="padding: 1rem" class="group relative overflow-hidden rounded-lg bg-gray-500 text-lg shadow focus:ring-4 focus:ring-red-300">
                    <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Update Contact</span>
                </button>
            </a>
            </div>

        <div>
            @if(session('success'))
                <p style="color: white">{{session('success')}}</p>
            @endif
            @if(session('error'))
                <p style="color: white">{{session('error')}}</p>
            @endif
            </br>
        </div>
        <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 40%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39);">
            <div class="text-white" style="margin-top: 5px; border-radius: 8px; width: 80%; height: 90%; padding: 1rem; background-color: rgb(17, 24, 39)">

                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-2xl ">Account <mark class="px-2 text-white rounded bg-red-500">DELETION</mark></h1>
                <p>Be very Cautious about this segment, Clicking delete will irrevocably delete your account and all associated information</p>
                </br>
                <form method="POST" action="{{route('delete-account')}}">
                    @csrf
                    <a>
                        <button style="padding: 0.5rem; width: 80%" type="submit" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')" class="group relative h-15 w-32 overflow-hidden rounded-lg bg-white text-lg text-red-300 shadow focus:ring-4 focus:ring-red-300">
                            <div class="absolute inset-0 w-3 bg-red-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                            <span class="relative text-black group-hover:text-white">Delete Account</span>
                        </button>
                    </a>
                </form>

            </div>
        </div>
    </div>
@endsection

</body>
</html>
