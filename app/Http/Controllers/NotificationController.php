<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
class NotificationController extends Controller
{
      public function index()
    {
        return view('admin.notification.index');
    }
    public function sendNotification(){
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            '2b19085361502f3d52f5',
            'a1757d78603569f351c3',
            '851915', $options
        );

        $message= "ยินดีต้อนรับเข้าสู่เว็บไซต์";

        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('notification', 'notification-event', $message);
    }
}

