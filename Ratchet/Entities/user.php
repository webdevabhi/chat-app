<?php
namespace ChatApp\Entities;

use Illuminate\Database\Eloquent\Model;
/**
* 
*/
class User extends Model
{
	
	protected $fillable = ['name', 'token'];
}