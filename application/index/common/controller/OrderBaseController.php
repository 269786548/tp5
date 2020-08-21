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
		$postJson = file_get_contents('php://input');//得到参数
		$header = $request::header();

		Log::info($postJson);
		Log::info(json_encode($header));
		$this->postJson = json_decode($postJson,true);

	}


	public function getService($serviceMethod){
		try
		{
			if(empty($this->postJson)){
				$return_data['code'] = 400;
				$return_data['message'] = 'need parameters!!!';
				return json($return_data);
			}
			$orderService = new OrderService($this->postJson);
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