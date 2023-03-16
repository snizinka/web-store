<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav>
        <ul>
            @auth
                <li>
                    <form method="post" action="{{route('logout')}}" class="sm:fixed sm:top-0 sm:right-10 p-6 text-right">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Log out</button>
                    </form>
                </li>
            @endauth
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth

                    @else
                        <li> <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>
                        <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                    @endauth
                </div>
            @endif
        </ul>
    </nav>

    @yield('content')
</div>
</body>
</html>
