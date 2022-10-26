<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use DB;

class HomeController extends Controller
{
    public function home() {
    	return view('welcome');
    }
    public function index()
    {
    	$tasks = Task::where('user_id', '=', Auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('home', compact('tasks'));
    }

    public function save(CreateTaskRequest $request){
    	$tasks = DB::select("select * from `tasks` as e where '".$request->start_time."' between e.start_time and e.end_time or e.start_time between '".$request->start_time."'and '".$request->end_time."'");
    	if (count($tasks) >= 4) {
    		return back()->with('fail', 'Ошибка, с таким почасовым графиком уже есть 4 задачи!');
    	}
    	$task = new Task;
    	$task->user_id = Auth()->user()->id;
    	$task->theme = $request->theme;
    	$task->description = $request->description;
    	$task->start_time = $request->start_time;
    	$task->end_time = $request->end_time;

    	if($request->file()) {
			$fileName = time().'_'.$request->file->getClientOriginalName();
			$filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
			$task->file = $fileName;
    	}
		$task->save();
		return back()->with('success','Задача создана.');
    }
}
