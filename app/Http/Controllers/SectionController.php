<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sections = Section::all();
            return response([
                'status'=>true,
                'message'=>'all sections',
                'data'=>$sections
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "status"=>false,
                "message"=>$th,
                
            ],Response::HTTP_PRECONDITION_FAILED);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'project_id'=>'required',
                'name'=>'required',
                'active'=>'required',
            ]);
            if (!$validator->fails()) {
                $section = new Section();
                $section->name = $request->name;
                $section->project_id = $request->project_id;
                $section->active = $request->active;
                $section->save();

                return response([
                    'status'=>true,
                    'message'=>'Section saved successfully'
                ],Response::HTTP_CREATED);
            } else {
                return response([
                    'status'=>false,
                    'message'=>$validator->curl_error,
                ],Response::HTTP_BAD_REQUEST);
            }
            
        } catch (\Throwable $th) {
            return response([
                'status'=>false,
                'message'=>$th,
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        try {
            return response([
                'status'=>true,
                'message'=>'section details',
                'data'=>$section
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response([
                'status'=>false,
                'message'=>'section details not found',
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        try {
            $validator = Validator::make($request->all(),[
                'project_id'=>'required',
                'name'=>'required',
                'active'=>'required',
            ]);
            if (!$validator->fails()) {
                $section->name = $request->name;
                $section->project_id = $request->project_id;
                $section->active = $request->active;
                $section->update();

                return response([
                    'status'=>true,
                    'message'=>'Section updated successfully'
                ],Response::HTTP_OK);
            } else {
                # code...
            }
            
        } catch (\Throwable $th) {
            return response([
                "status"=>true,
                "message"=>$th
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        try {
            $section->delete();

            return response([
                "status"=>true,
                "message"=>"Project Section deleted successfully"
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response([
                "status"=>true,
                "message"=>$th
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    public function active()
    {
        try {
            $sections = DB::table('sections')->where('active','=',true)
            ->orderBy('name','asc')->get();
            return response([
                'status'=>true,
                'message'=>'active sections',
                'data'=>$sections
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "status"=>false,
                "message"=>$th,
                
            ],Response::HTTP_PRECONDITION_FAILED);
        }
    }
}
