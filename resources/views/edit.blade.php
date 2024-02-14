@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;"><h3>To DO Creator</h3></div>

                    <div class="card-body">
                        <form action="/todos/{{$todo->id}}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                <div class="row mb-3">
                                <div class="col-md-8 offset-md-2 d-flex">
                                    <input type="text" class="form-control" name="name" placeholder="Write your TODO" value="{{$todo->name}}">
                                </div>
                                <div class="form-check offset-md-5 mt-4"> Already done
                                    <input type="checkbox" class="form-check-input" name="pass" value="{{$todo->pass}}">
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection