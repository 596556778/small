<?php
namespace app\api\controller;
use app\api\validate\UserValidate;
use EasyWeChat\Factory;
class Index extends Common
{
	public function index(){

		echo 'good!';
	}

	public function login(){
		$params = (new UserValidate())->toCheck('login');

		$config = [
			'app_id' => \Env::get('APP_ID'),
			'secret' => \Env::get('APP_SERCTER')
		];
		$wechat = Factory::miniProgram($config);//实例化
		$session_data = $wechat->auth->session($params['mini_code']);
		$this->response($session_data);
	}
}