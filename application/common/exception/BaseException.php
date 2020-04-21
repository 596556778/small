<?php 
namespace app\common\exception;
use think\Exception;

class BaseException extends Exception{
	public  $code = 400;
	public  $msg = 'invalid parameters';
	public  $status = 0;
	public  $data = null;

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