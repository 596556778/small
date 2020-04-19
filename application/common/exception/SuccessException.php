<?php
namespace app\common\exception;
class SuccessException extends BaseException{
	public  $code = 200;
	public  $msg = 'ok';
	public  $status = 0;
	public  $data = null;
}