<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class AdminController extends Controller
{
    public function index()
    {
		$tasks = Task::orderBy('id', 'desc')->paginate(25);
	    return view('dashboard', compact('tasks'));
    }

    public function setStatusTask($type, $id) {
    	Task::where('id', '=', $id)->update(['status'=>$type]);
    	return redirect()->back();
    }
}
