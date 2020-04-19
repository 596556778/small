<?php 
namespace app\common\exception;
use think\Exception;

class BaseException extends Exception{
	protected  $code = 400;
	protected  $msg = 'invalid parameters';
	protected  $status = 0;
	protected  $data = null;

	public function __construct($params = []){

		if(!is_array($params)){
			return;
		}
		if(array_key_exists('msg', $params)){
			$this->msg = $params['msg'];
		}
		if(array_key_exists('code', $params)){
			$this->code = $params['code'];
			if($params['code'] == 200){
				$this->status = 1;
			}
		}
		if(array_key_exists('data', $params)){
			$this->data = $params['data'];
		}
	}

}