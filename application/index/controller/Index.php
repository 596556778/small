<?php
namespace app\index\controller;
use Exception;
use think\Controller;
use think\facade\Log;
use app\common\exception\SuccessException;

class Index extends Controller
{
    public function index()
    {	
		$name = 'zhangsan';
		$sex = 26;
		if($sex > 18){
			throw new SuccessException(['msg'=>'太老了','code'=>200]);
		}
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
