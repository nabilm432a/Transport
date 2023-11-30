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

    <div class="text-white" style="margin-left: 5px; margin-top: 5px; border-radius: 8px; width: 100%; height: 50%; padding: 1rem;background-color: rgb(17, 24, 39);">
        <div style="padding: 0.5rem; background-color: rgb(50, 29, 39); border-radius: 8px">
            <p>Trip Notification Email was sent</p>
        </div>
@endsection

@section('footer')

@endsection
</body>
</html>
