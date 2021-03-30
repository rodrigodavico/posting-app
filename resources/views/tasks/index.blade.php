@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="text-xl font-bolder text-gray-600 mb-6">Tasks</p>

            <form action="{{ route('tasks') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="description" class="sr-only">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                    placeholder="Task description!">{{ old('description')}}</textarea>
                </div>

                @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-4">
                    <label for="expiration" class="sr-only">Expiration</label>
                    <input type="date" name="expiration" id="expiration" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg @error('expiration') border-red-500 @enderror"
                    placeholder="DD/MM/YYYY" value="{{ old('expiration')}}"/>
                </div>

                @error('expiration')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Create Task</button>
                </div>
            </form>
            @if($tasks->count())
            {{--tasks data--}}
                @foreach($tasks as $task)
                    <x-task :task="$task"/>
                @endforeach
                {{ $tasks->links() }}
            @else
                <p>there are no tasks..</p>
            @endif
        </div>
        
    </div>
@endsection