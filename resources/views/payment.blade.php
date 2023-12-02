
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
    .main-header {
        padding: 15px 0 15px;
    }
    header.new-header .site-wrapper {
        padding: 0 5px 0 0;
    }
</style>
<body style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
@section('header')

@endsection

@section('main')
    <div class="payment_option" style="text-align: center; margin-top: 50px; color: white;">
        <div class="Text">
            <h1 style="font-size: 36px;">Select Payment Method</h1>
        </div>
        <div>
            <form action="{{ route('bkash') }}" method="POST">
                @csrf
                <div class="bkash" style="display: inline-block; margin: 20px;">
                    <button type="submit" style="border: none; background: none; padding: 0;">
                        <img src="https://seeklogo.com/images/B/bkash-logo-835789094A-seeklogo.com.png" height="70" width="150" alt="">
                    </button>
                </div>
            </form>
        </div>
        <div>
            <form action="{{ route('nagad') }}" method="POST">
                @csrf
                <div class="nagad" style="display: inline-block; margin: 20px;">
                    <button type="submit" style="border: none; background: none; padding: 0;">
                        <img src="https://images.prothomalo.com/prothomalo-english/2020-04/cada797e-1d38-4a22-ae54-9a3317d35f39/Nagad.png?w=1200&h=524" height="70" width="150" alt="">
                    </button>
                </div>
            </form>
        </div>

        <form action="{{ route('visa') }}" method="POST">
            @csrf
            <div class="visa" style="display: inline-block; margin: 20px;">
                <button type="submit" style="border: none; background: none; padding: 0;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" height="70" width="150" alt="">
                </button>
            </div>
        </form>

        <form action="{{ route('master') }}" method="POST">
            @csrf
            <div class="master" style="display: inline-block; margin: 20px;">
                <button type="submit" style="border: none; background: none; padding: 0;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/200px-MasterCard_Logo.svg.png" height="70" width="150" alt="">
                </button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <!-- Include any footer content or leave it empty -->
@endsection

</html>

