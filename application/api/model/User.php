<?php
namespace app\api\model;
use think\Model;

class User extends Model{
	protected $table = 'small_user';
	protected $pk = 'user_id';
}