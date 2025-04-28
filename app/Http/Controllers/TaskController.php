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

        // validayson doğrulama

        $task = new Task();
        $task ->category_id = 1;
        $task->title = $req->title;
        $task->content = $req->content;
        $task->status = $req->status;
        $task->deadline = $req->deadline;
        $task->save();

        return 'success';
    }
}

