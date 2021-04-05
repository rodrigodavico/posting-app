@extends('layouts.app')

@section('content')
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg flex flex-col">
            <h2 class="text-center text-xl mb-6">User Profile</h2>

            @csrf
                        
            <div class="w-100 bg-gray-100 border-2 self-start my-4 p-4 rounded-lg flex">
                <img src="{{ isset(auth()->user()->avatar) ? asset('storage/' . auth()->user()->avatar) : asset('storage/user-avatar.png') }}" alt="" class="w-3/4 mx-6 rounded-full">
                <input id="avatar" name="avatar" type="file">
            </div>
            
            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="username" class="text-gray-600 text-md">Username:</label>
                <input type="text" name="username" id="username" placeholder="Your Username"
                class="bg-white border-2 w-full p-4 rounded-lg
                @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="name" class="text-gray-600 text-md">Name:</label>
                <input type="text" name="name" id="name" placeholder="Your Name"
                class="bg-white border-2 w-full p-4 rounded-lg
                @error('name') border-red-500 @enderror" value="{{ auth()->user()->name }}">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="email" class="text-gray-600 text-md">Email:</label>
                <input type="text" name="email" id="email" placeholder="Your Email"
                class="bg-white border-2 w-full p-4 rounded-lg
                @error('email') border-red-500 @enderror" value="{{ auth()->user()->email }}">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="password" class="text-gray-600 text-md">Password:</label>
                <input type="password" name="password" id="password" placeholder="Your Password"
                class="bg-white border-2 w-full p-4 rounded-lg
                @error('password') border-red-500 @enderror">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="password_confirmation" class="text-gray-600 text-md">Repeat:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password"
                class="bg-white border-2 w-full p-4 rounded-lg
                @error('password_confirmation') border-red-500 @enderror">

                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" href="" class="bg-blue-500 text-white px-4 py-2 rounded
                font-medium">Update</button>
            </div>
        </div>
    </form>
@endsection