<?php
namespace app\common\validate;
use think\Validate;
use think\facade\Request;
use app\common\exception\BaseException;

class BaseValidate extends Validate{
	public function toCheck($scene = '', $params = []){
		$fields = [];
		if(empty($params)){
			$params = Request::param();
		}
		if(!empty($scene)){
			$this->scene($scene);
			if(!empty($this->scene[$scene])){
				foreach ($this->scene[$scene] as $value) {
					if(array_key_exists($value, $params)){
						$fields[$value] = $params[$value];
					}
				}
			}
		}
		if(!$this->check($params)){
			throw new BaseException(['msg'=>is_array($this->error)?implode(',', $this->error):$this->error]);
		}
		return $fields;
	}
}