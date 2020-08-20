<?php
namespace app\index\common\controller;
use think\Controller;
use app\index\service\OrderService;
use think\request;
use think\facade\Log;

class OrderBaseController extends Controller
{
	public $postJson;
	public function __construct(Request $request)
	{
		$postJson = $request->param();
		Log::info('test');
	}


	public function getService($serviceMethod){

		try
		{
			$orderService = new OrderService();
			$result = $orderService->$serviceMethod(); //实例化
		}catch (\Think\Exception $e) {
			$result = array(
				'code' => $e->getCode(),
				'message'  => $e->getMessage(),
			);
		}
		return json($result);

	}
}