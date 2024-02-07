@extends('layouts.app')
@section('title', $task->title)
@section('content')   
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
    </div> 
@endsection

    