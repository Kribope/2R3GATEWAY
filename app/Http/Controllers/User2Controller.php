<?php

namespace App\Http\Controllers;


use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Services\User2Service;
//use App\Models\User;

Class User2Controller extends Controller {

    use ApiResponser;

    /**
     * The service to consume the User1 Microservice
     * @var User2Service
     */

    public $user2Service;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User2Service $user2Service){
        $this->user2Service = $user2Service;
    }

    //GET THE USER BY INDEX

    public function index(){
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    //TO ADD USER
    
    public function add(Request $request){
        return $this->successResponse($this->user2Service->createUser2($request->all(),Response::HTTP_CREATED));
    }   

    //TO SHOW THE INFORMATION ON THE USER'S ID

    public function show($id){
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    //UPDATE THE INFORMATION TO THE USER

    public function update(Request $request,$id){
        return $this->successResponse($this->user2Service->editUser2($request->all(),$id));
        return $this->successResponse($this->user2Service->editUsers2($request->all(),$id));
    }

    //DELETE USERS DATA

    public function delete($id){
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}