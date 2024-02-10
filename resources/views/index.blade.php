
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

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
          class="font-medium text-gray-700 underline decoration-pink-500">Add Task!</a>
      </nav>
        
    {{-- Second approach or Alternative rendering --}}
    @forelse ($tasks as $task)
    <div>
        <a href="{{ route('tasks.singletask', ['task' => $task->id]) }}"
            @class(['line-through' => $task->completed]) class="link">{{ $task->title }}</a>
    </div>
@empty
    <p>There are no tasks</p>
@endforelse


@if ($tasks->count())
<nav class="mt-4">
  {{ $tasks->links() }}
</nav>
@endif

@endsection
</div>