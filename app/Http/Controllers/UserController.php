<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){

        $status = false;
        $message = "";
        $token = "";
        $credentials = [];
        
        
        
        $validator = Validator::make($request->all(),[
            "email"=>"required",
            "password"=>"required"
        ]);

        
        
        if($validator->fails()){
            $status = false;
            $message = $validator->errors()->toJson();
        }else{
            $credentials = $request -> only('email','password');
            
        }
        
        
        if(!Auth::attempt($credentials)){
            $status = false;
            $message = "Invalid Credentials";
        }else{
            $status = true;
            $message = "User login successfull";
            
            $token = Auth::user()->createToken("access_token")->accessToken;
        }

        

        return response()->json([
            "status" => $status,
            "message" => $message,
            "access_token" => $token
        ]);

    }

    public function register(Request $request){
        
        $validator = Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "pid"=>"required",
            "gender"=>"required",
        ]);
        
        $user = new User();
        $status = false;
        $message = "";
        
        if($validator->fails()){

            $status = false;
            $message = $validator->errors()->toJson();
        
        }else{
            DB::beginTransaction();

            try {
                $user->name = $request->name;
                $user->email=$request->email;
                $user->phone=$request->phone;
                $user->gender=$request->gender;
                $user->pid=$request->pid;
                $user->password=bcrypt($request->password);
                
                $user->save();
                DB::commit();
                $status = true;
                $message = "User Registed Sucessfully";
            } catch (\Throwable $th) {
                DB::rollBack();
                $status = false;
                $message = $th;
                
            }

        
            
        }

        

        return response()->json([
            "status" => $status,
            "message" => $message,
        ]);
    }

    public function profile(){
        $user = Auth::user();

        return response()->json([
            "status" => false,
            "message" => "Logged user details",
            "data" => $user
        ]);
    }

    public function logout(Request $request){

        $token = $request->user()->token();
        $token->revoke();

        return response()->json([
            "status" => true,
            "message" => "logout successful",
        ]);

    }

    public function index()
    {
        
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
