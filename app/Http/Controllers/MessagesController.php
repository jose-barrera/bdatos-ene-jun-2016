<?php
namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use Log;
use Validator;
use Illuminate\Http\Request;

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
		$messages = Message::where('sender_id', Auth::id())->get();
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

		if ($validator->passes()) {
			$message = new Message;
			$message->subject = $request['subject'];
			$message->content = $request['content'];
			$message->sender_id = Auth::id();
			$message->receiver_id = $request['receiver_id'];
			$message->category_id = 1;
			$message->save();

			return redirect()->route('messages.index');
		} else {
			return redirect()->route('messages.create')
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
		return view('messages.show');
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
}
