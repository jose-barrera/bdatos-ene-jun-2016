<?php
namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use Log;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Message;

class MessagesController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$messages = Message::where('receiver_id',Auth::id())->get();
		return view('messages.index', ['messages' => $messages]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{	
		return view('messages.create');
	}

	/**
	 * Show the form for creating a new resource for a specific user.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getCreateId($id)
	{
		$user=User::where('id', $id)->first();
		return view('messages.create',['user'=>$user]);
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
			'receiver_id' => 'numeric|required',
			'subject' => 'required',
			'content' => 'required'
		]);

		$receiver = User::where('id',$request['receiver_id'])->first();

		if (Auth::user()->hasRole('tenant') || $receiver->hasPropertie())
			if ($validator->passes()) {
				$message = new Message;
				$message->subject = $request['subject'];
				$message->content = $request['content'];
				if (!Auth::user()->hasRole('tenant'))
					$message->property_id = $receiver->rentalProperty()->first()->id;
				else
					$message->property_id = Auth::user()->rentalProperty()->first()->id;
				$message->sender_id = Auth::id();
				$message->receiver_id = $request['receiver_id'];
				$message->category_id = 1;
				$message->save();

				return redirect()->route('messages.index');
			} else {
				return redirect()->route('messages.create')
					->withErrors($validator)->withInput();
			}
		else{
			Session::flash('flash.message', "Deve asignar una propiedad al inquilino");
			return redirect()->route('properties.index');
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
		$message = Message::where('id', $id)->first();
		return view('messages.show', ['message' => $message]);
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
		$message = Message::findOrFail($id);
		$message->read_on = Carbon::now();
		$message->save();
		return redirect()->route('messages.index');
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getMessageSent()
	{
		$messages = Message::where('sender_id', Auth::id())->get();
		return view('messages.index', ['messages' => $messages, 'sent' => true]);
	}

}
