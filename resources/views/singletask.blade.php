@extends('layouts.app')
@section('title', $task->title)
@section('content')   
<div>{{$task->id}}</div>
<div>{{$task->description}}</div>
@if($task->long_description)
    <div>{{$task->long_description}}</div>
    @endif
@endsection
    