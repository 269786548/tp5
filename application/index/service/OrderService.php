<?php
namespace app\index\service;
use app\index\model\Order;
use app\index\service\BaseService;


class OrderService extends BaseService{
	public $baseService ;
	public $order ;
	public function __construct()
	{
		$this->baseService = new BaseService();
		$this->order = new Order();
	}

	public function getOrderQuery(){
		$this->baseService->checkIpParaSign();
		return $this->getOrderStatus();

//		return array('a'=>123,'b'=>'abc');
	}


	public function getOrderStatus()
	{
		$res = $this->order->getOrderStatus();
		return $res;
	}
}