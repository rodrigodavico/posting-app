@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg flex flex-col">
            <h2 class="text-center text-xl mb-6">User Profile</h2>
            
            <div class="w-100 bg-gray-100 border-2 self-start my-4 p-4 rounded-lg flex">
                <img src="/pics/{{auth()->user()->id}}.jpg" alt="" onclick="{{-- route('profile.change_pic') --}}" class="w-100 y-100 mx-6 rounded-full">
                <button class="mx-10 p-2 self-center border">Change Pic</button>
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

            <div class="mb-4 bg-gray-100 border-2 w-full p-4 rounded-lg">
                <label for="username" class="text-gray-600 text-md">Username:</label>
                <span class="pl-2 text-gray-600 font-medium">{{ auth()->user()->username }}</span>
            </div>
        </div>
    </div>
@endsection