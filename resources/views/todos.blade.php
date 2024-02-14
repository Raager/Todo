@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center mx-4 py-3">
            <h2>To Do list</h2>
        </div>
        <div class=" d-flex justify-content-center mx-5 py-3">
            <a href="/todos/create">
                <button class="btn btn-primary mx-5">Create new</button>
            </a>
        </div>
        <ul class="w-50 list-group">
            @foreach($todos as $todo)
            <li class="list-group-item">
                <div class="d-flex justify-content-center">
                    @if($todo->pass)
                    <a href="/todos/{{$todo->id}}/edit"style="color: black; text-decoration: none;"><h4><s>{{$todo->name}}</s></h4></a>
                    <input class="ms-4" type="checkbox" onclick="event.preventDefault(); 
                    document.getElementById('form-control-{{$todo->id}}').submit()"
                    checked>
                    @else
                    <a href="/todos/{{$todo->id}}/edit" style="color: black; text-decoration: none;"><h4>{{$todo->name}}</h4></a>
                    <input class="ms-4" type="checkbox" onclick="event.preventDefault(); 
                    document.getElementById('form-control-{{$todo->id}}').submit()">
                    @endif
                    <form action="/todos/{{$todo->id}}/check" id="form-control-{{$todo->id}}" style="display:none" method="post">
                    @csrf
                    @method('put')
                    </form>

                </div>
                <div class="d-flex justify-content-center pe-5">
                    <button class="btn btn-danger ms-5" onclick="event.preventDefault();
                    if(confirm('Are you shure you want to delete this todo?')) {
                    document.getElementById('form-delete-{{$todo->id}}').submit()}">Delete</button>
                    <form action="/todos/{{$todo->id}}/delete" id="form-delete-{{$todo->id}}" style="display:none" method="post">
                    @csrf
                    @method('delete')
                    </form>
                </div>

            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection