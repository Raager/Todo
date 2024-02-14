@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;"><h3>To DO Updator</h3></div>

                    <div class="card-body">
                        <form action="/todos" method="post" class="form-group">
                        @csrf
                                <div class="row mb-3">
                                <div class="col-md-8 offset-md-2">
                                    <input type="text" class="form-control" name="name" placeholder="Write your TODO">
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