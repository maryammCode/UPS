<?php

namespace App\Http\Controllers\Intranet;


use App\Http\Controllers\Controller;

use App\Chat;
use App\Events\ChatSent;
use App\Http\Services\NotificationService;
use App\Message;
use App\Models\User;
use App\UserChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMessage()
    {

        $users_chat = UserChat::where('user_id', auth()->user()->id)->get();
        $all_users = User::all();
        $active_page = 'messages';
        return view('intranet.shared.message', ['active_page' => $active_page, 'all_users' => $all_users, 'users_chat' => $users_chat]);
    }

    public function message($chat_id)
    {
        // $users = User::whereHas('receivers')->orWhereHas('senders')->with('receivers')->get();
        $users_chat = UserChat::where('user_id', auth()->user()->id)->get();

        $all_users = User::all();
        $active_page = 'messages';

        $active_chat= UserChat::where('user_id', auth()->user()->id)->where('chat_id', $chat_id)->first();

        if($active_chat){
            $messages = Message::where('chat_id', $chat_id)->get();

        // Message::where('sender_id', $selected_user->id)->where('receiver_id', auth()->user()->id)->update(['seen' => 1]);
        return view('intranet.shared.message', ['active_page' => $active_page, 'users_chat' => $users_chat, 'all_users' => $all_users, 'messages' => $messages, 'chat_id' => $chat_id]);
        }else{
            return back();
        }

    }
    public function newMessage($user_id)
    {

        $data = UserChat::join('chats', 'chats.id', 'user_chats.chat_id')
            ->whereNull('chats.designation')
            ->where('user_chats.user_id', $user_id)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))->from('user_chats as uc')->where('user_id', auth()->user()->id)->whereColumn('uc.chat_id', 'chats.id');
            })->first();

        if ($data != null) {
            $chat_id = $data->chat_id;
            // $users = User::whereHas('receivers')->orWhereHas('senders')->with('receivers')->get();
            $users_chat = UserChat::where('user_id', auth()->user()->id)->get();

            $all_users = User::all();
            $active_page = 'messages';

            $messages = Message::where('chat_id', $chat_id)->get();

            // Message::where('sender_id', $selected_user->id)->where('receiver_id', auth()->user()->id)->update(['seen' => 1]);
            return view('intranet.shared.message', ['active_page' => $active_page, 'users_chat' => $users_chat, 'all_users' => $all_users, 'messages' => $messages, 'user_id' => $user_id, 'chat_id' => $chat_id]);

        } else {
            // $users = User::whereHas('receivers')->orWhereHas('senders')->with('receivers')->get();
            $new_chat_group = new Chat();
            $new_chat_group->etat = 0;
            $new_chat_group->user_id = auth()->user()->id;
            $new_chat_group->save();

                $new_users_chat_group = new UserChat();

                $new_users_chat_group->user_id = $user_id;
                $new_users_chat_group->chat_id = $new_chat_group->id;
                $new_users_chat_group->save();

                $new_users_chat_group2 = new UserChat();

                $new_users_chat_group2->user_id = auth()->user()->id;
                $new_users_chat_group2->chat_id = $new_chat_group->id;
                $new_users_chat_group2->save();
            // $users = User::whereHas('receivers')->orWhereHas('senders')->with('receivers')->get();
            $users_chat = UserChat::where('user_id', auth()->user()->id)->get();
            $messages = Message::where('chat_id', $new_chat_group->id)->get();

            $all_users = User::all();
            $active_page = 'messages';

            // $messages = Message::where('chat_id', $chat_id)->get();
            return view('intranet.shared.message', ['active_page' => $active_page, 'users_chat' => $users_chat, 'all_users' => $all_users, 'messages' => $messages, 'user_id' => $user_id, 'chat_id' => $new_chat_group->id]);


        }

        //  dd($data);
    }


    public function sendMessage(Request $request)
    {
        if ($request->chat_id == 'new') {

            $new_chat = new Chat();
            $new_chat->user_id = auth()->user()->id;

            $new_chat->save();

            $new_users_chat1 = new UserChat();
            $new_users_chat1->user_id = auth()->user()->id;
            $new_users_chat1->chat_id = $new_chat->id;
            $new_users_chat1->save();

            $new_users_chat2 = new UserChat();
            $new_users_chat2->user_id = $request->receiver_id;
            $new_users_chat2->chat_id = $new_chat->id;
            $new_users_chat2->save();
            $chat_id = $new_chat->id;
        } else {
            $chat_id = $request->chat_id;
        }
        $new_msg = new Message();
        $new_msg->content = $request->content;
        /* if($request->hasFile('file')){

        } */
        $new_msg->user_id = auth()->user()->id;
        $new_msg->chat_id = $chat_id;
        $new_msg->save();

        $users_chat = UserChat::whereNot('user_id', auth()->user()->id)->where('chat_id' ,  $chat_id)->get();

        foreach ($users_chat as $receiver) {
           // \broadcast(new ChatSent($receiver, $request->content , auth()->user()));
            (new NotificationService)->send($receiver->user_id , 'Nouveau Message de '.$request->content , '/intranet/messages/'.$receiver->chat_id);
        }
        return $new_msg;
    }





    public function sendMessageGroup(Request $request)
    {

        $new_chat_group = new Chat();
        $new_chat_group->designation = $request->designation_group;
        $new_chat_group->etat = 0;
        $new_chat_group->user_id = auth()->user()->id;
        $new_chat_group->save();

        $is_auth_user_added = false;
        foreach ($request->users as $user_id) {
            $new_users_chat_group = new UserChat();

            $new_users_chat_group->user_id = $user_id;
            $new_users_chat_group->chat_id = $new_chat_group->id;
            $new_users_chat_group->save();
            if($user_id ==  auth()->user()->id){
                $is_auth_user_added = true;
            }
        }
        if(!$is_auth_user_added){
            $new_users_chat_group = new UserChat();

            $new_users_chat_group->user_id = auth()->user()->id;
            $new_users_chat_group->chat_id = $new_chat_group->id;
            $new_users_chat_group->save();
        }

        return back();
    }

}
