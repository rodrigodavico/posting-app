@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg flex flex-col">
            <h2 class="text-center text-xl mb-6">User Profile</h2>
            
            <div class="w-100 bg-gray-100 border-2 self-start my-4 p-4 rounded-lg flex">
                <img src="{{ isset(auth()->user()->avatar) ? asset('storage/' . auth()->user()->avatar) : asset('storage/user-avatar.png') }}" alt="" class="w-3/4 mx-6 rounded-full">
            </div>
            
            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="username" class="text-gray-600 text-md">Username:</label>
                <span class="pl-2 text-gray-600 font-medium">{{ auth()->user()->username }}</span>
            </div>

            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="username" class="text-gray-600 text-md">Name:</label>
                <span class="pl-2 text-gray-600 font-medium">{{ auth()->user()->name }}</span>
            </div>
            
            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="username" class="text-gray-600 text-md">Email:</label>
                <span class="pl-2 text-blue-400 font-medium">{{ auth()->user()->email }}</span>
            </div>

            <div class="my-2">
                <a href="{{ route('profile.edit') }}" class="bg-gray-200 text-black px-6 py-2 rounded
                font-medium">Edit</a>
            </div>
        </div>
    </div>
@endsection