<?php 

namespace ChatApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use ChatApp\Entities\ActiveConnection;
use ChatApp\Entities\User;
use ChatApp\Entities\ActiveChatMessage;

/**
* 
*/
class Chat implements MessageComponentInterface
{
	protected $clients;
	private $subscriptions;
    private $users;
	
	function __construct()
	{
		$this->clients = new \SplObjectStorage;
		$this->subscriptions = [];
        $this->users = [];
	}

	public function onOpen(ConnectionInterface $conn)
	{
		$this->clients->attach($conn);
		echo "New Connection: ({$conn->resourceId})\n";
		$this->users[$conn->resourceId] = $conn;
		$lastUser = User::orderBy('id', 'DESC')->first();
		ActiveConnection::create(['conn_id' => $conn->resourceId, 'user_id' => $lastUser->id ]);
	}

	public function onMessage(ConnectionInterface $from, $msg)
	{
		// echo $msg."\n";
		/*foreach ($this->clients as $client) {
			if ($client !== $from) {
				$client->send($msg);
			}
		}*/
		$data = json_decode($msg);
        switch ($data->command) {
            case "subscribe":
                $this->subscriptions[$from->resourceId] = $data->channel;
                $this->subscriptions[$data->channel] = $from->resourceId;
                break;
            case "message":
                if ($this->subscriptions[$from->resourceId]) {
                    $target = $this->subscriptions[$from->resourceId];

                    foreach ($this->subscriptions as $id=>$channel) {
                        if ($id == $target && $channel == $from->resourceId) {
                            $this->users[$id]->send($data->message);
                            ActiveChatMessage::create(['sender_id' => $from->resourceId, 'receiver_id' => $target, 'msg' => $data->message ]);
                        }
                    }
                }
        }
	}

	public function onClose(ConnectionInterface $conn)
	{
		$this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);
		echo "Connection ({$conn->resourceId}) has disconnected\n";
		$active_conn = ActiveConnection::where('conn_id', $conn->resourceId)->first();
		ActiveConnection::destroy($active_conn->id);
	}

	public function onError(ConnectionInterface $conn, \Exception $e)
	{
		echo "An error has been occured: {$e->getMessage()}\n";
		$conn->close();
	}
}