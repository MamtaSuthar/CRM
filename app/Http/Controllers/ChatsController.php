<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
class ChatsController extends Controller
{
  public function index()
  {
    return view('chat.index');
  }
}
