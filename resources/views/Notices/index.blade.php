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
        <div style="margin-left: 9rem"><h1>Notice Management</h1></div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding-bottom: .5rem">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" style="text-align: center;">ID</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Date</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Title</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Description</th>
                <th scope="col" class="px-6 py-3" style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notices as $notice)
                <tr>
                    <td style="text-align: center;">{{$notice->id}}</td>
                    <td style="text-align: center;">{{$notice->created_at}}</td>
                    <td style="text-align: center;">{{$notice->title}}</td>
                    <td style="text-align: center;">{{$notice->description}}</td>
                    <td style="text-align: center;">
                        <a href="{{route('Notices.edit', $notice)}}" style="border: white 2px solid; padding: 0.4rem">Edit</a>
                        <form style="display: inline-block; border: white 2px solid; padding: 0.3rem" method="POST" action="{{route('Notices.destroy', $notice)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
</body>
</html>
