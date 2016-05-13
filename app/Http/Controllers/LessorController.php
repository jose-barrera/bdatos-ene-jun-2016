<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Models\PropertyGroup;
use App\Models\PropertyType;
use App\Models\Property;

class LessorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.lessor');
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

    public function getProperty($id)
    {
        return $id;
    }

    public function getRegisterProperty()
    {
        $property_groups = PropertyGroup::all();
        $property_types = PropertyType::all();
        $user = Auth::user();
    	return view('lessor.registerProperty', [
            'property_groups' => $property_groups,
            'property_types' => $property_types,
            'user' => $user]);	
    }

    public function postRegisterProperty(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => '',
            'address' => 'required',
            'postal_code' => 'required|numeric',
            'type_id' => 'required|numeric',
            'property_group_id' => 'numeric',
            'lessor_id' => 'required|numeric']);

        if ($validator->passes() and Auth::id() === intval($request->get('lessor_id'))) {
            $property = Property::create($request->all());
        } else
            return redirect('lessor/register-property')->withErrors($validator)->withInput();
    }

    public function getMessage()
    {
    	return view('lessor.message');
    }

    public function getNotification()
    {
    	return view('lessor.notification');
    }

    public function getStateProperty()
    {
    	return view('lessor.stateProperty');
    }
}
