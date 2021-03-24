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
            <span class="text-sm font-thin">this is the Home Screen speaking..</span>
        </div>
    </div>
@endsection