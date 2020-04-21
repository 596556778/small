<?php
namespace app\api\validate;
use app\common\validate\BaseValidate;

class UserValidate extends BaseValidate
{
	protected $rule = [
		'mini_code' => 'require'
	];

	protected $message = [

	];

	protected $sence = [
		'login' => ['mini_code']
	];
}