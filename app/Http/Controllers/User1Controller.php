<?php

namespace App\Http\Controllers;


use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Services\User1Service;
//use App\Models\User;

Class User1Controller extends Controller {

    use ApiResponser;

    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */

    public $user1Service;

    /**
     * Create a new controller instance
     * @return void
     */

    public function __construct(User1Service $user1Service){
        $this->user1Service = $user1Service;
    }

    //GET THE USER BY INDEX

    public function index(){
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    //TO ADD USER
    
    public function add(Request $request ){
        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
    } 

    //TO SHOW THE INFORMATION ON THE USER'S ID

    public function show($id){
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }

    //UPDATE THE INFORMATION TO THE USER USING PUT

    public function update(Request $request,$id){
        return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
        return $this->successResponse($this->user1Service->editUsers1($request->all(),$id));
    }

    //DELETE USERS DATA

    public function delete($id){
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}