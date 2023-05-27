<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $project = Project::all();

            return response()->json([
                "status"=>true,
                "message"=>"All the projects",
                "data"=>$project
            ]);

        }catch(\Throwable $th){
            return response()->json([
                "status"=>false,
                "message"=>$th,
                
            ]);

        }
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
        try{
            DB::beginTransaction();

            $project = new Project();
            $project->contract_id=$request->contract_id;
            $project->name=$request->name;
            $project->active=$request->active;

            $project->save();
            DB::commit();
            return response()->json([
                "status"=>true,
                "message"=>"Contract Saved successfully"
            ]);

        }catch(\Throwable $th){
            return response()->json([
                "status"=>false,
                "message"=>$th
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        

        try{

            $project = Project::find($id);

            if (!is_null($project)) {
                DB::beginTransaction();
                $project->active=$request->active;
                $project->name=$request->name;
                $project->contract_id=$request->contract_id;
                $project->update();
                DB::commit();
                return response()->json([
                    "status"=>true,
                    "message"=>"Project updated successfully"
                ]);
            } else {
                return response()->json([
                    "status"=>false,
                    "message"=>"Requested project not found"
                ]);
            }
            

        }catch(\Throwable $th){
            return response()->json([
                "status"=>false,
                "message"=>$th
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
