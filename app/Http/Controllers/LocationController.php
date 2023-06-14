<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sections = Location::all();
            return response([
                'status'=>true,
                'message'=>'all loactions',
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
        
        try {
            $validator = Validator::make($request->all(),[
                'section_id'=>'required',
                'name'=>'required',
                'active'=>'required',
            ]);
            
            if (!$validator->fails()) {
                $location = new Location();
                $location->name = $request->name;
                $location->section_id = $request->section_id;
                $location->active = $request->active;
                $location->save();

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
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        try {
            return response([
                'status'=>true,
                'message'=>'location details',
                'data'=>$location
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response([
                'status'=>false,
                'message'=>'location details not found',
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        try {
            $validator = Validator::make($request->all(),[
                'section_id'=>'required',
                'name'=>'required',
                'active'=>'required',
            ]);
            if (!$validator->fails()) {
                $location->name = $request->name;
                $location->section_id = $request->section_id;
                $location->active = $request->active;
                $location->update();

                return response([
                    'status'=>true,
                    'message'=>'Location updated successfully'
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
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        try {
            $location->delete();

            return response([
                "status"=>true,
                "message"=>"Project location deleted successfully"
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response([
                "status"=>true,
                "message"=>$th
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    public function active(){

        try {
            $locations = DB::table('locations')->where('active','=',true)
            ->orderBy('name','asc')->get();
            return response([
                'status'=>true,
                'message'=>'active locations',
                'data'=>$locations
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "status"=>false,
                "message"=>$th,
                
            ],Response::HTTP_PRECONDITION_FAILED);
        }
    }
}
