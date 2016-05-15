<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Models\Property;
use App\Models\PropertyGroup;
use App\Models\PropertyType;
use App\Models\Rent;
use App\Models\User;
use App\Models\UserRole;

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
            return redirect()->route('properties.create')
                ->withErrors($validator)->withInput();
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

    /**
     * Gets the form to rent a property.
     * @param  int  $id     Property Id.
     * @return \Illuminate\Http\Response
     */
    public function getRent($id)
    {
        $property = Property::findOrFail($id);
        $tenants = User::whereHas('roles', function ($q) {
            $q->where('role_id', UserRole::where('key', 'tenant')->first()->id);
        })->get();
        return view('properties.rent', [
            'property' => $property,
            'tenants' => $tenants
        ]);
    }

    /**
     * Registers the rent.
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postRent(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        if ($property->lessor_id !== Auth::user()->id) {
            return redirect()->route('properties.index', ['id' => $id]);
        }

        $validator = Validator::make($request->all(), [
            'lessor_id' => 'required|numeric',
            'holder_id' => 'numeric',
            'tenant_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->route('properties.get_rent', ['id' => $id])
                ->withErrors($validator)->withInput();
        } else {
            if (!isset($request['holder_id']))
                $request['holder_id'] = $request['tenant_id'];
            $request['property_id'] = $id;
            $request['active'] = true;
            $rent = Rent::create($request->all());
            return redirect()->route('properties.index', ['id' => $id]);
        }
    }
}
