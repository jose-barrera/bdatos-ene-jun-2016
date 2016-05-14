<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Models\Property;
use App\Models\PropertyGroup;
use App\Models\PropertyType;

class PropertiesController extends Controller
{
    /**
     * Create a new property controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.lessor', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property_groups = PropertyGroup::all();
        $property_types = PropertyType::all();
        $user = Auth::user();
        return view('properties.create', ['property' => new Property,
            'property_groups' => $property_groups,
            'property_types' => $property_types,
            'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            if ($request->get('property_group_id') === '')
                $request['property_group_id'] = null;
            
            $property = Property::create($request->all());

            return redirect()->route('properties.show', ['id' => $property->id]);
        } else {
            return redirect()->route('properties.create')->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', ['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
