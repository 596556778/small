<?php
namespace app\api\controller;
use think\facade\Request;
use think\Controller;
use think\facade\Log;
class Common extends Controller{
	
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

	protected function showJson($data = '',$msg = 'ok', $code = '200', $status = 1){
		$result = [
			'msg' => $msg,
			'code' => $code,
			'status' => ($status)?'success':'failure',
			'data' => $data
		];
		Log::record(json_encode($result),'error');
		return json($result);
	}

}