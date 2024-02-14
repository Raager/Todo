<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
// use App\Models\User;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $todos = auth()->user()->todos()->orderBy('pass')->get();
        return view('todos', compact('todos'));
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required|max:255',
        ]);

        auth()->user()->todos()->create($data);

        return redirect('todos');
    }

    public function edit($id){
        $todo = auth()->user()->todos()->find($id);
        return view('edit', compact('todo'));
    }

    public function update(Request $request, $id){
        $todo = auth()->user()->todos()->find($id);
        $todo->name =  $request->input('name');
        if($request->input('pass') == null) {
            $todo->pass = false;
        }
        else {$todo->pass = true;}
        // dd($todo->pass);
        // $todo->pass =  $request->input('pass');
        $todo->save();


        return redirect('todos');
    }

    public function create(){
        return view('/create');
    }

    public function check($id){
        $todo = auth()->user()->todos()->find($id);
        $todo->pass = !$todo->pass;
        $todo->save();

        return redirect('todos');
    }

    public function delete($id){
        $todo = auth()->user()->todos()->find($id);
        $todo->delete();

        return redirect('todos');
    }
}
