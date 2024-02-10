@extends('layouts.app')
@section('title', $task->title)
@section('content')   


<p class="mb-4">
    @if ($task->completed)
      <span class="font-medium text-green-500">Completed</span>
    @else
      <span class="font-medium text-red-500">Not completed</span>
    @endif
  </p>

  
<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
  </div>

<div class="mb-4 text-slate-700">{{$task->description}}</div>
@if($task->long_description)
    <div class="mb-4 text-slate-700">{{$task->long_description}}</div>
    @endif
    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
        {{ $task->updated_at->diffForHumans() }}</p>
   <div>

    <form action="{{route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    
    <a href="{{route('tasks.edit', ['task' => $task->id])}}"">Edit Task</a>
    </div> 


    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task->id])}}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
              </button>
        </form>
    </div>

@endsection