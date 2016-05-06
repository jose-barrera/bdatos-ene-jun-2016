<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LessorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('welcome');
    }
    public function getRegisterProperty(){
    	return view('lessor.registerProperty');	
    }
    public function postRegisterProperty(){
    	return;
    }
    public function getMessage(){
    	return view('lessor.message');
    }
    public function getNotification(){
    	return view('lessor.notification');
    }
    public function getStateProperty(){
    	return view('lessor.stateProperty');
    }
}
