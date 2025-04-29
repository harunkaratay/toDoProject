<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createPage(){
        return view('panel.tasks.create');
    }

    public function addTask(Request $req){
        //dump and die
        //dd($req->all());

        // Validation doğrulama
       $req->validate([
           'title' => 'required|max:12|min:3',
       ]);

       $task = new Task();
       $task->category_id=1;
       $task->title = $req->input('title');
       $task->content = $req->input('content');
       $task->status = $req->input('status');
       $task->deadline = $req->input('deadline');
       $task->save();

       return'başarılı';

    }
}
