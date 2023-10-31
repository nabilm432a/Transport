<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transportation</title>
    @vite('resources/css/app.css')
</head>
<body>
<header>
    @yield('header')
    <nav class="border-gray-200 bg-gray-900 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Transportation</span>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-900 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="{{route('homepage')}}" class="text-white md:hover:text-blue-700">Home</a>
                    </li>
                    @guest()
                        <li>
                            <a href="{{route('login')}}" class="text-white md:hover:text-blue-700">Login</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white md:hover:text-blue-700">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>

                    @endguest
                    @if (auth()->user() && auth()->user()->is_admin)
                        <li>
                            <a href="{{route('admin-panel')}}" class="text-white md:hover:text-blue-700">Admin Panel</a>
                        </li>
                    @else
                        @auth
                            <li>
                                <a href="{{route('dashboard')}}" class="text-white md:hover:text-blue-700">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('profile')}}" class="text-white md:hover:text-blue-700">{{auth()->user()->name}}</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    @yield('main')
</main>

<footer>
    @yield('footer')
</footer>
</body>
</html>
