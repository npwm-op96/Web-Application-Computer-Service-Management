<?php

namespace App\Http\Controllers;

use App\Chat;
// use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //     public function __construct()
    // {
    //   $this->middleware('auth');
    // }

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  return view('chat');
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages(Request $request)
{
  $id_ticket = $request->id_ticket;
  $message = Chat::where('id_ticket',$id_ticket)->with('chatsmessage')->get();
  // $message = Chat::with('chatsmessage')->get();
  // $message = Chat::All();
  return response()->json($message);

}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
public function sendMessage(Request $request)
  {
    // $message = $request->all();

  }
}
