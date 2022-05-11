<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Step;
use App\Models\User;
use Faker\Provider\Lorem;
use Nette\Utils\Validators;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Controllers\Auth;

class TodoController extends Controller
{
    function index()
    {
        $mytodo = auth()->user()->todos()->orderBy('completed')->get(); //with has many relationship ordered by completed 0,1
        // $mytodo = Todo::orderby('completed')->get();            
        return view('todos.index', ['mytodos' => $mytodo]);
    }

    function create()
    {
        return view('todos.create');
    }


    //serving validation from Form Request which we made though [php artisan make:request TodoCreateRequest]=============================
    function store(TodoCreateRequest $req)
    {
        // // $req->validate(['title' => 'required|max:255']);                                 //Default error message

        // // $rules = ['title' => 'required|max:255'];                                        //Custom error message  
        // $messages = ['title.max' => 'Todo title should not exceeds 255 character !!!!!'] ;
        // $validator = Validator::make($req->all(), $rules, $messages);
        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Todo::create($req->all());

        //create eloquent relationship with todo and user table
        
        $todo = auth()->user()->todos()->create($req->all());
        foreach($req->steps as $step){
            $todo->steps()->create(['name' => $step]);
        }      
        return redirect()->back()->with('message', "You created something");
    }
    //======================================================================================================================================

    function edit(Todo $id)                         //type hinting model
    {
        return view('todos/edit', compact('id'));   //compact same as creating array and passing it to view
    }
    //======================================================================================================================================

    function update(Todo $id, TodoCreateRequest $req) //here we are passing both model and request(TodoCreateRequest) to keep code less
    {
        $id->update(['title' => $req->title, 'description' => $req->description]);
        return redirect()->back()->with('message', "You updated something");
    }

    //======================================================================================================================================
    function complete(Todo $id)
    {
        $id->update(['completed' => true]);
        return redirect()->back()->with('message', "Hooray!! Task Completed");
    }

    function incomplete(Todo $id)
    {
        $id->update(['completed' => false]);
        return redirect()->back()->with('message', "Task Marked as Incompleted");
    }

    //======================================================================================================================================
    function delete(Todo $id)
    {
        $id->delete();
        return redirect()->back()->with('message', "Task Deleted");
    }
}
