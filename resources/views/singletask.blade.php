@extends('layouts.app')
@section('title', $task->title)
@section('content')   


<p>
    @if($task->completed)
    Completed
    @else
    Not Completed
    @endif
</p>


<div>{{$task->id}}</div>
<div>{{$task->description}}</div>
@if($task->long_description)
    <div>{{$task->long_description}}</div>
    @endif

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