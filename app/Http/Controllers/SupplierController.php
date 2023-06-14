<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sections = Supplier::all();
            return response([
                'status'=>true,
                'message'=>'all suppliers',
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
                'bp_code'=>'required',
                'name'=>'required',
            ]);
            if (!$validator->fails()) {
                $supplier = new Supplier();
                $supplier->br_no = $request->br_no;
                $supplier->bp_code = $request->bp_code;
                $supplier->name = $request->name;
                $supplier->email = $request->email;
                $supplier->phone = $request->phone;
                $supplier->active = $request->active;
                $supplier->save();

                return response([
                    'status'=>true,
                    'message'=>'Supplier saved successfully'
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        try {
            return response([
                'status'=>true,
                'message'=>'supplier details',
                'data'=>$supplier
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response([
                'status'=>false,
                'message'=>'supplier details not found',
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        try {
            $validator = Validator::make($request->all(),[
                'bp_code'=>'required',
                'name'=>'required',
            ]);
            if (!$validator->fails()) {
                $supplier->br_no = $request->br_no;
                $supplier->bp_code = $request->bp_code;
                $supplier->name = $request->name;
                $supplier->email = $request->email;
                $supplier->phone = $request->phone;
                $supplier->active = $request->active;
                $supplier->update();

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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();

            return response([
                "status"=>true,
                "message"=>"Supplier deleted successfully"
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response([
                "status"=>true,
                "message"=>$th
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}
