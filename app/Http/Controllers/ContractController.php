<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = DB::table('contracts')->get();

        return response()->json([
            "status"=>true,
            "message"=>"All the contracts",
            "data"=>$contracts
        ]);
    }


    public function save(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'code'=>'required',
            'active'=>'required'
        ]);

        if (!$validator->fails()) {
            
            try {

                DB::beginTransaction();
                
                $contract = new Contract();
                $contract->code = $request->code;
                $contract->name = $request->name;
                $contract->active = $request->active;
                $contract->save();
                DB::commit();
    
                return response()->json([
                    "status"=>true,
                    "message"=>"Contract Saved successfully"
                ]);
                
            
            } catch (\Throwable $th) {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'code'=>'required',
            'active'=>'required'
        ]);

        if (!$validator->fails()) {
            

            try {

                DB::beginTransaction();
                $contract = Contract::find($id);
                
            if (!is_null($contract)) {
                $contract->code = $request->code;
                $contract->name = $request->name;
                $contract->active = $request->active;
                $contract->update();
                DB::commit();
                
                return response()->json([
                    "status"=>true,
                    "message"=>"Contract Updated successfully"
                ]);
            } else {
                $contract = new Contract();
                $contract->code = $request->code;
                $contract->name = $request->name;
                $contract->active = $request->active;
                $contract->save();
                DB::commit();
    
                return response()->json([
                    "status"=>true,
                    "message"=>"Contract Saved successfully"
                ]);
                
            }
    
            
            } catch (\Throwable $th) {
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
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
