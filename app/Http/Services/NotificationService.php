<?php
namespace App\Http\Services;

use App\Events\NotifSent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Notification;
use App\StudentsPredefinedList;

class NotificationService {

    public function send($user_id , $text , $link){

        $new_notif = new Notification();
        $new_notif->user_id = $user_id;
        $new_notif->text = $text;
        $new_notif->link = $link;
        $new_notif->sender_id = Auth::user()->id;
        $new_notif->seen = 0;
        $new_notif->is_notif_sent = 0;
        $new_notif->save();
      //  \broadcast(new NotifSent($user_id, $text , Auth::user() , $new_notif));
      return ;
  }
  public function sendToGroupTd($group_td_id , $text , $link){

    $cins = StudentsPredefinedList::where('groupe_td_id' , $group_td_id)->get()->pluck('cin');
    $users = User::whereIn('cin' , $cins)->get();
    foreach ($users as $user) {
       $this->send($user->id , $text , $link) ;
    }

  return ;
}


}


