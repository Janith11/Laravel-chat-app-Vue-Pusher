<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Events\NewMessage;
use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller 
{
    public function get(){
        $contacts =User::where('id', '!=', auth()->id())->get();

        return response()->json($contacts);
    }

    public function getMessagesFor($id){
        $messages =Message::where('from', $id)->orWhere('to',$id)->get();
        return response()->json($messages);
    }

    public function send(Request $request){
        
        $message=Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        
        // dump($message);
        // broadcast(new NewMessage($message));

        // return response()->json($message);

        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
