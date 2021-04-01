<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>POSTING-APP</title>
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <body class="bg-gray-200">
            <nav class="p-6 bg-white flex justify-between mb-6">
                <ul class="flex items-center">
                    
                    <li class="p-6">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    
                    @auth
                        <li class="p-6">
                            <a href="{{ route('tasks') }}">Tasks</a>
                        </li>    
                    @endauth
                    
                    <li class="p-6">
                        <a href="{{ route('posts') }}">Posts</a>
                    </li>

                </ul>

                <ul class="flex items-center">
                    
                    @auth
                        <li class="p-6">
                            <a href="{{ route('profile') }}">
                                <img src="/pics/{{auth()->user()->id}}.jpg" alt="profile-picture" class="w-8 y-8 mr-2 rounded-full inline">
                                {{auth()->user()->name}}
                            </a>
                        </li>
                        <li class="p-6">
                            <form action="{{ route('logout') }}" method="post" class="inline p-3">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="p-6">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="p-6">
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    
                </ul>
            </nav>
            @yield('content')
        </body>
    </head>
</html>