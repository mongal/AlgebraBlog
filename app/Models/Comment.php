<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
	* The attributes that are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['user_id', 'post_id', 'content'];
	
	 /**
	* The Eloquent users model name
	* 
	* @var string
	*/
	protected static $usersModel = 'App\Models\Users';
	
		
	 /**
	* The Eloquent comments model name
	* 
	* @var string
	*/
	protected static $postsModel = 'App\Models\Post';
	
	
	
	/**
	* Returns the user relationship
	* 
	* @return \Illumunate\Database\Eloquent\Relations\HasMany
	*/
	
	public function user()
	{
		return $this->belongsTo(static::$usersModel, 'user_id');
	}
	
	
	 /**
	* Returns the posts relationship
	* 
	* @return \Illumunate\Database\Eloquent\Relations\HasMany
	*/
	
	public function post()
	{
		return $this->belongsTo(static::$postsModel, 'post_id');
	}
	
	 /**
	* Save Comment
	* 
	* @param array $post
	* @return void
	*/
	public function saveComment($comment=array())
	{
		return $this->fill($comment)->save();
	}
	
	 /**
	* Update Comment
	* 
	* @param array $post
	* @return void
	*/
	public function updateComment($comment=array())
	{
		return $this->update($comment);
	}
}
