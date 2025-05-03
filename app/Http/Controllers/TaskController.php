<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $tasks = Auth::user()->getTasks();
        $tasks = Task::all(); // veya Task::where('user_id', auth()->id())->get();
        return view('panel.tasks.index', compact('tasks'));
    }

    public function createPage(){
        $categories = Category::where('user_id', Auth::user()->id)->get();
        return view('panel.tasks.create', compact('categories'));
    }

    public function addTask(Request $request){
        //dump and die
        //dd($req->all());

        // Validation doğrulama
       $request->validate([
           'title' => 'required|max:12|min:3',
       ]);

       $task = new Task();
       $task->category_id = $request->input('category');
       $task->title = $request->input('title');
       $task->content = $request->input('content');
       $task->status = $request->input('status');
       $task->deadline = $request->input('deadline');
       $task->save();

       return redirect()->route('panel.Index')->with(['success', 'Görev başarıyla eklendi.']);
    }

}
