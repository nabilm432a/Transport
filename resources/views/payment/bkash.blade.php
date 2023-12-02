
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
        /*font-weight: 700;*/
        font-size: 20px;
        text-decoration: none;
    }
    .site-logo .header-logo .header-logo-img {
        margin-right:10px;
    }
    .site-logo .header-logo-text {
        align-items: center;
        color: #DA924E;
        /*font-weight: 700;*/
        font-size: 20px;
    }
    .main-header {
        padding: 15px 0 15px;
    }
    header.new-header .site-wrapper {
        padding: 0 5px 0 0;
    }
    .Bpayment{
        background-color: #c9166f;
        width: 500px;
        height: 400px;
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%,-50%);
        border-radius: 10px;
    }

    .paymentpic{
        width: 100%;
        height: 90px;
        border-radius:10px ;
    }
    .Bpayment p{
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        color: aliceblue;
    }


    .pin{
        margin-top: 60%;
    }
    .input{
        text-align: center;
        border-radius: 30px;
    }
</style>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bkash</title>
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    </head>
@endsection

@section('main')
    <!DOCTYPE html>
    <html lang="en">


    <body>
    <div class= "Bpayment">
        <div class="bkash_image">
            <img src="https://seeklogo.com/images/B/bkash-logo-835789094A-seeklogo.com.png" class="paymentpic" alt="">
        </div>
        <form action="{{ route('processPayment') }}" method="post">
            @csrf
            <p style = "position:absolute; right:152px; top: 97px">Enter Your bKash Number</p>
            <div class="input"style = "position:absolute; right:133px; top: 120px">
                <input type="text" name="number" id="number" placeholder="01XXXXXXXXX">
            </div>

            <p class="pin" style = "position:absolute; right:230px; top: 168px">PIN</p>
            <div class="input" style = "position:absolute; right:133px; top: 190px">
                <input type="password" name="password" id="password" placeholder="Enter Pin">
            </div>
            <div style = "position:absolute; right:188px; top: 245px">
                <input type="submit" class="btn tbn-primary" value="Submit" name="">
            </div>
        </form>
    </div>



    </div>

    </body>
    </html>

    <!-- height="95px" width="300"
    <input type="submit" name="" placeholder="Submit" class="btn"> -->




@endsection

@section('footer')
    <!-- Include any footer content or leave it empty -->
@endsection

</html>

