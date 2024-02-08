
<div>

    {{-- First approach --}}
    {{-- @if (count($tasks))
     <div>There are tasks</div> 

     @foreach($tasks as $task)
     <div>{{$task->id}}</div>
     <div>{{$task->title}}</div>
     <div>{{$task->description}}</div>
     <div>{{$task->completed}}</div>
     @endforeach
     @else
     <div>There is not tasks!</div> 

    @endif --}}


    @extends('layouts.app')
    
    @section('title', 'The list of tasks')

    

    @section('content')

    <div>
        <a href="{{route('tasks.create')}}"">Add New Task</a>
    </div>
        
    {{-- Second approach or Alternative rendering --}}
    @forelse ($tasks as $task)
    <li>
        <a href="{{route('tasks.singletask', ['task' => $task->id])}}">
            {{ $task->title }}
        </a>
    </li>
@empty
    <p>There are no tasks</p>
@endforelse


@if ($tasks->count())
<nav>
  {{ $tasks->links() }}
</nav>
@endif

@endsection
</div>