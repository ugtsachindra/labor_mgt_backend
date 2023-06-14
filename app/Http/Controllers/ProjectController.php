<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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
        
        $validator = Validator::make($request->all(),[
            'contract_id'=>'required',
            'name'=>'required',
            'active'=>'required'
        ]);

        if (!$validator->fails()) {
            
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
                    "message"=>"Contract saved successfully"
                ]);
    
            }catch(\Throwable $th){
                return response()->json([
                    "status"=>false,
                    "message"=>$th
                ]);
            }

        } else {
            return response()->json([
                    "status"=>false,
                    "message"=>$validator->errors()->toJson()
                ]);
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return response()->json([
            "status"=>true,
            "message"=>"Contract Saved successfully",
            "data"=>$project
        ]);

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
        $validator = Validator::make($request->all(),[
            'contract_id'=>'required',
            'name'=>'required',
            'ative'=>'required'
        ]);

        if (!$validator->fails()) {
            
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

        } else {
            return response()->json([
                    "status"=>false,
                    "message"=>$validator->errors()->toJson()
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

              
        try{
            

            if(!is_null($project)){

                $response = $project->delete();
                return response()->json([
                    "status"=>true,
                    "message"=>"Project deleted"
                ]);

            }else{
                return response()->json([
                    "status"=>false,
                    "message"=>"Project not found"
                ]);
            }

        }catch(Throwable $th){
            return response()->json([
                "status"=>false,
                "message"=>$th
            ]);
        }
    }

    public function active(){


        try {
            $projects = DB::table('projects')->where('active','=',true)
            ->orderBy('name','asc')->get();
            return response([
                'status'=>true,
                'message'=>'active projects',
                'data'=>$projects
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "status"=>false,
                "message"=>$th,
                
            ],Response::HTTP_PRECONDITION_FAILED);
        }
    }
}
