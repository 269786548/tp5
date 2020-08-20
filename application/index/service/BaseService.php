<?php
namespace app\index\service;



class BaseService {


	public function checkIpParaSign(){
		$this->checkIp();

//		$this->checkSign();

	}



	function checkIp(){
		$ip = getIp();
		if (!in_array($ip,array('115.128.222.200','127.0.0.1','221.217.92.126'))) {
			throw new \think\Exception('error','403');
		}
	}

	function checkSign($data,$auth_key){
		$sign = $data['sign'];
		unset($data['sign']);
		//验证sign
		if ($sign != get_sign($data,$auth_key)) {
			throw new \Think\Exception('sign error','1001');
		}
	}

}