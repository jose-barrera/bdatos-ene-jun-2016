<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Models\Property;
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
        $property_types = PropertyType::all();
        $user = Auth::user();
        return view('properties.create', ['property' => new Property,
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
            'alias' => 'required',
            'description' => '',
            'address' => 'required',
            'postal_code' => 'required|numeric',
            'type_id' => 'required|numeric',
            'lessor_id' => 'required|numeric']);

        if ($validator->passes() and Auth::id() === intval($request->get('lessor_id'))) {
            $property = Property::create($request->all());

            return redirect()->route('properties.index');
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
        $property = Property::findOrFail($id);
        return view('properties.edit', ['property' => $property]);
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
        $property = Property::findOrFail($id);

        if ($property->lessor->id !== Auth::id()) {
            Session::flash('flash.message', '"Solo el arrendador de la" .
                " propiedad $id puede eliminarla!"');
            Session::flash('flash.level', 'danger');
            return redirect()->route('properties.index');
        }

        if ($property->currentRent()->exists()) {
            Session::flash('flash.message', "La propiedad $id no puede ser" .
                " eliminada dado que esta rentada actualmente.");
            Session::flash('flash.level', 'danger');
            return redirect()->route('properties.index');
        }

        $property->delete();

        Session::flash('flash.message', "La propiedad $id fue eliminada con éxito!");
        Session::flash('flash.level', 'success');
        return redirect()->route('properties.index');
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

        if ($property->lessor_id !== Auth::user()->id) {
            Session::flash('flash.message', 'Debe ser el arrendador de esta' .
                ' propiedad para llevar a cabo esta acción.');
            Session::flash('flash.level', 'danger');
            return redirect()->route('properties.index');
        }

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
            Session::flash('flash.message', 'Debe ser el arrendador de esta' .
                ' propiedad para llevar a cabo esta acción.');
            Session::flash('flash.level', 'danger');
            return redirect()->route('properties.index');
        }

        $validator = Validator::make($request->all(), [
            'property_id' => 'required|numeric|equals:' . $property->id,
            'tenant_id' => 'required|numeric',
            'expires' => 'date'
        ], ['lessor_id.equals' => 'The :attribute field must match the' .
            ' property lessor\'s id']);

        if ($validator->fails()) {
            return redirect()->route('properties.get_rent', ['id' => $id])
                ->withErrors($validator)->withInput();
        } else {
            // Detach current rent.
            if ($property->currentRent()->exists())
                $property->currentRent()->delete();

            // Fix request data.
            if($request['expires'] === '')
                $request['expires'] = null;

            // Register new rent.
            $rent = Rent::create($request->all());

            Session::flash('flash.message', 'La renta se registró con éxito!');
            Session::flash('flash.level', 'success');
            return redirect()->route('properties.index');
        }
    }

    /**
     * Clear the current rent.
     * @param  int $id
     * @return Illuminate\Http\Response
     */
    public function deleteRent($id)
    {
        $property = Property::findOrFail($id);

        if($property->lessor->id === Auth::id()) {
            if($property->currentRent()->exists()) {
                $property->currentRent()->delete();

                Session::flash('flash.message',
                    "La renta de la propiedad $id se borró con éxito!");
                Session::flash('flash.level', 'success');
                return redirect()->route('properties.index');
            } else {
                Session::flash('flash.message',
                    "La propiedad $id no se encontraba rentada.");
                return redirect()->route('properties.index');
            }
        } else {
            Session::flash('flash.message',
                "La propiedad $id no le pertenece.");
            Session::flash('flash.level', 'danger');
            return redirect()->route('properties.index');
        }
    }
}
