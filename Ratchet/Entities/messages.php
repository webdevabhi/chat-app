<?php
namespace ChatApp\Entities;

use Illuminate\Database\Eloquent\Model;
/**
* 
*/
class ActiveChatMessage extends Model
{
	
	protected $fillable = ['sender_id', 'receiver_id', 'msg'];
}