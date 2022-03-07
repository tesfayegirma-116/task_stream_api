<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::orderBy('created_at', 'desc')->get();
        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tasks' => 'required',
            'day' => 'required',
        ]);

        $tasks = new Tasks();
        $tasks->tasks = $request->tasks;
        $tasks->day = $request->day;
        $tasks->reminder = $request->reminder == 1 ? true : false;
        
        $tasks->save();

        return response()->json($tasks);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($tasks)
    {
        $tasks = Tasks::find($tasks);
        $tasks->reminder = $tasks->reminder == 1 ? 0 : 1;
        $tasks->tasks = $tasks->tasks; 
        $tasks->day = $tasks->day; 
        $tasks->save();
        return response()->json($tasks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tasks)
    {
        $tasks = Tasks::find($tasks);
        $tasks->delete();
        return response()->json(['successfully delated', $tasks]);
    }
}
