<?php
namespace vendor;

/**
 * Class Output
 * @package vendor
 * 接口输出类封装
 */
class Output
{	
	public $code;
	public $msg;
	public $data;

	public function transport($isunicode = false)
	{
		if ($isunicode) {
			echo json_encode($this);
		}
		else {
			echo json_encode($this, JSON_UNESCAPED_UNICODE);
		}
	}
}