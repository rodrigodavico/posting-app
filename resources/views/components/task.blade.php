@props(['task' => $task])

<div class="mb-2">
    <a href="{{ route('users.posts', $task->user) }}" class="font-bold">{{ $task->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $task->created_at->format('d/m/Y') }}</span>
    <p class="mb-2">{{ $task->description }}</p>
    <span class="mb-2 text-underline">Expires:</span>
    
    {{--DateTime::createFromFormat('Y-m-d H:i:s', $task->expiration) < new DateTime()--}}
    @if(\Carbon\Carbon::parse($task->expiration)->gt(new DateTime()))
        <p class="text-green-400 font-bg">
            {{ \Carbon\Carbon::parse($task->expiration)->format('d/m/Y') }}
        </p>
    @else
        <p class="text-red-400 font-bg">
            {{ \Carbon\Carbon::parse($task->expiration)->format('d/m/Y') }}
        </p>
    @endif
    
</div>
<form class="mb-6" action={{ route('tasks.destroy', $task) }} method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-blue-500">Delete</button>
</form>