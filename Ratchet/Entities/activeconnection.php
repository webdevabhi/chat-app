<?php
namespace ChatApp\Entities;

use Illuminate\Database\Eloquent\Model;
/**
* 
*/
class ActiveConnection extends Model
{
	
	protected $fillable = ['conn_id', 'user_id'];
}