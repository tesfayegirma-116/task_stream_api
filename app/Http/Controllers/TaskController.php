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
    public function index(Request $request)
    {
        $tasks = Tasks::query();
        return response()->json($tasks->paginate($request->per_page ?? 4));
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
     * Store a newly created resource in storage.use  <Pagination.Next /> logic
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
    public function update(Request $request, $tasks)
    {
        
        $tasks = Tasks::find($tasks);
        $tasks->tasks = $request->tasks;
        $tasks->day = $request->day;
        $tasks->reminder = $request->reminder == 1 ? true : false;

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
