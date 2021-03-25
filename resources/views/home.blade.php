@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="text-lg font-md text-green-600 mb-6">
                Hello 
                @if(Auth::check()) 
                    {{ auth()->user()->name }}!
                @else
                    Guest!
                @endif
            </p>
            <span class="text-sm font-thin">This is the Home Screen..</span>

            <div class="flex-col space-between items-center">
                <div class="w-2/4 h-2/4 bg-gray-100 shadow-md rounded-md m-8"></div>
                <span class="text-md text-gray-500">Please login or register to see more content.</span>
            </div>
        </div>
    </div>
@endsection