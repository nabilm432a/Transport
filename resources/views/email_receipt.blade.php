@extends('layouts.app')
    <!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="..">
<title>Payment</title>

<style>

    .p1 {
        font-family: "Times New Roman", Times, serif;
    }
    .site-logo .header-logo {
        display: flex;
        align-items: center;
        color: #DA924E;
        font-weight: 700;
        font-size: 20px;
        text-decoration: none;
    }
    .site-logo .header-logo .header-logo-img {
        margin-right:10px;
    }
    .site-logo .header-logo-text {
        align-items: center;
        color: #DA924E;
        font-weight: 700;
        font-size: 20px;
    }

    header.new-header .site-wrapper {
        padding: 0 5px 0 0;
    }




    text{
        font-family:'Times New Roman', Times, serif;
        color: rgb(10, 10, 10);
    }
    .final_page{
        width:70vw;
        height: 30vh;
        position: absolute;
        top: 35%;
        background-color: rgb(201, 95, 95);
        left:16%;
        border-radius:50px;
    }
    .Text h1{
        font-family: Times New Roman;
        text-align: center;
        color: rgb(10, 10, 10);

    }



</style>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')
@endsection

@section('main')
    <body>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <div class="final_page">
        <div class="Text">
            <h1>Your payment receipt has been sent to your email.</h1>
        </div>
    </div>
    <form action="{{ route('dashboard') }}" method="get">
        @csrf
        <div class="login-form-control-single">
            <div class="login-form-control-single">
                <button class="login-form-submit-btn" type="submit" style = "position:absolute; right:750px; top: 450px">Click here to go back to the Dashboard</button>
            </div>
        </div>
    </form>



    </body>
@endsection

@section('footer')
    <!-- Include any footer content or leave it empty -->
@endsection

</html>
