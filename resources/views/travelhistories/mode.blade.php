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
        <div class="text-white w-1/3" style="margin-top: 100px; border-radius: 8px; height: 90%; padding: 3rem;background-color: rgb(17, 24, 39); width: 40%">
            <div style="margin-bottom: 10px; background-color: rgb(45, 55, 72); border-radius: 8px">
                <h2 class="mb-2 ml-2 mt-0 text-2xl font-medium leading-tight text-primary">Enter the type of travel you want</h2>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <form method="POST" action="{{route('transport-mode-select')}}" style="border: 2px solid;padding: 1.5rem; border-radius: 8px; margin-bottom: 5px">
                    @csrf
                    <div class="md:flex md:items-center mb-6 mt-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="transport_mode">
                                Transport Mode:
                            </label>
                        </div>
                        <div class="md:w-2/3" style="padding: 1.5rem;">
                            <select class="text-black" name="transport_mode" id="transport_mode" required>
                                <option class="text-black" value="bus" >Bus</option>
                                <option class="text-black" value="airplane">Airplane</option>
                                <option class="text-black" value="rail">Rail</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin-top: 5px">
                        <button type="submit" class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Select</button>
                    </div>
                </form>

            </div>
            <div>
                <a href="{{ back()->getTargetUrl() }}"><button class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50" data-te-ripple-init data-te-ripple-color="light">Back</button></a>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
