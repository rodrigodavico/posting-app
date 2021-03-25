@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="mb-2">
                <a href="{{ route('users.posts', $task->user) }}" class="font-bold">{{ $task->user->name }}</a>
                <span class="text-gray-600 text-sm">{{ $task->created_at->format('d/m/Y') }}</span>
                <p class="mb-2">{{ $task->description }}</p>
                <span class="mb-2 text-underline">Expires at:</span>
                <p class="text-red-400 font-bg">{{ \Carbon\Carbon::parse($task->expiration)->format('d/m/Y') }}</p>
            </div>
            <form class="mb-6" action={{ route('tasks.destroy', $task) }} method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        </div>
    </div>
@endsection