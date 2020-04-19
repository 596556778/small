<?php
namespace app\common\exception;
use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;
use app\common\exception\BaseException;
use think\facade\Log;
class ExceptionHandle extends Handle{
	protected $msg;
	protected $code;
	protected $status;
	protected $data;

	public function render(Exception $e){
		
		if($e instanceof ValidateException){
			return json($e->getMessage(),422);
		}elseif($e instanceof HttpException && request()->isAjax()){
			return response($e->getMessage(), $e->getStatusCode());
		}elseif($e instanceof BaseException){
			Log::record($e->msg,'error');
			$this->msg = $e->msg;
			$this->code = $e->code;
			$this->status = $e->status;
			$this->data = $e->data;
			
		}else{
			return parent::render($e);
		}
		$result = [
			'msg'=> $this->msg,
			'code'=> $this->code,
			'status'=> $this->status,
			'data'=> $this->data,
		];
		return json($result);
	}
}