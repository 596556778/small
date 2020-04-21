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

	protected $scene = [
		'login' => ['mini_code']
	];
}