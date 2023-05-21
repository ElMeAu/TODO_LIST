<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Tasks;
use App\Http\Controllers\TaskController;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;



class TaskController extends Controller
{
    function showTask() {

        $currentDate = Carbon::now();

        $tasks = Tasks::where('endDate', '>=', $currentDate)->where('accomplished', '=', 0)->get();
        
        return view('tasks', [
            'tasks' => $tasks
            
        ]);
    }

    function addTask (Request $request) {
            
            $request->validate([
                'title' => 'required|min:15',
                'endDate' =>'required'
            ]);
            
                $task = new Tasks;
                $task->title = $request->title;
                $task->description= $request->description;
                $task->endDate= $request->endDate;
                $task->save();

                return redirect('/tasks');
    }

    function deleteTask($id) { 
            Tasks::destroy($id);

            return redirect('/tasks');
    }
    
    function updateTask( Request $request, $id) {

        $update = Tasks::find($id);
        
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|min:15',
                'endDate' =>'required'
            ]);

            $update->title = $request->input('title');
            $update->description = $request->input('description');
            $update->endDate = $request ->input('endDate');
            
            $update->save();

            return redirect('/tasks');
        };

        return view('update',['task' => $update]);      
    }

    function checkbox(Request $request, $id)
    {
        $update = Tasks::find($id);
        $update->accomplished = 1;
        $update->save();

        return redirect('/tasks');
    }

}