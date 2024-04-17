<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ratchet\MessageComponentInterface;

use Ratchet\ConnectionInterface;


class WebSocketController extends Controller implements MessageComponentInterface
{
    protected $clients;
    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }
    public function onOpen(ConnectionInterface $conn)
    {

        $querystring = $conn->httpRequest->getUri()->getQuery();

        parse_str($querystring, $queryarray);
        $id = $queryarray['user_id'];


        try {
            $user = User::find($id);

            if ($user) {
                $user->chat_connection_id = $conn->resourceId;
                $user->is_online =true;

                if ($user->save()) {
                    echo "Updated! ({$id})\n";
                } else {
                    echo "Failed to update! ({$id})\n";
                }
            } else {
                echo "User not found! ({$id})\n";
            }
        } catch (\Exception $e) {
            echo "An error occurred: {$e->getMessage()}\n";
        }


        $this->clients->attach($conn);
    }

    function onMessage(ConnectionInterface $conn, $msg)
    {

        $data = json_decode($msg);
        var_dump($data);
        if (isset($data->type)) {
            if ($data->type == 'request_send_message') {
                //save chat message in mysql

                $conversation = new Conversation();
                $conversation->sender_id = $data->from_user_id;
                $conversation->receiver_id = $data->to_user_id;
                if ($conversation->save()) {

                    $message = new Message;
                    $message->conversation_id = $conversation->id;
                    $message->user_id = $data->from_user_id;
                    $message->message = $data->message;
                    $message->save();
                }


                foreach ($this->clients as $client) {
                    
                        $client->send($msg);
                    
                }
            }
        }
    }

    function onClose(ConnectionInterface $conn)
    {
       
        $querystring = $conn->httpRequest->getUri()->getQuery();

        parse_str($querystring, $queryarray);
        $id = $queryarray['user_id'];


        try {
            $user = User::find($id);

            if ($user) {
                $user->chat_connection_id = 0;
                $user->is_online =false;

                if ($user->save()) {
                    echo "Updated! ({$id})\n";
                } else {
                    echo "Failed to update! ({$id})\n";
                }
            } else {
                echo "User not found! ({$id})\n";
            }
        } catch (\Exception $e) {
            echo "An error occurred: {$e->getMessage()}\n";
        }

        $this->clients->detach($conn);
    }


    function onError(ConnectionInterface $conn, \Exception $e)
    {

        echo "An error has occurred with user {$e->getMessage()}\n";

        $conn->close();
    }
}
