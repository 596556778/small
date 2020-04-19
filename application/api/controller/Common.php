<?php
namespace app\api\controller;
use think\facade\Request;
class Common{
	
	protected $user;
	protected $token;
	public function __construct(){
		
		$uri = Request::controller() .'/'. Request::action();
		if($this->ignoreUrl($uri)){

			// $token = I('GET.token');
			// if(!$token){
			// 	exception('请先登录');
			// }
			//获取session中的用户信息
			//赋值给user
		}
		
	}

	protected function ignoreUrl($uri){
		$urls = $this->whiteList();
		if(in_array($uri, $urls)){
			return false;
		}
		return true;
	}

	private function whiteList(){
		return [
			'index/login'
		];
	}
}