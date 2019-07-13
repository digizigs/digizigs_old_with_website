<?php

namespace App\Http\Controllers\Admin\Chat;

use App\Events\AppChatEvent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    
    public function index(){

    	return view('admin.pages.chat.chat');
    }

    public function chatUsers(){
    	//$users = User::orderby('firstname','asc')->get();
    	//$contacts = User::where('id', '!=', auth()->id())->orderby('firstname','asc')->get();
    	$contacts = User::where('id', '!=', auth()->id())->get();

    	$unreadIds = Chat::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();
        
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

    	return request()->json(200,$contacts);
    }

     public function getMessagesFor($id) {

     	
        Chat::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

   
        $messages = Chat::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function send(Request $request) {

    	
        $message = Chat::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new AppChatEvent($message));

        return response()->json($message);
    }

}
