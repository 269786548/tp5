<?php
namespace app\index\controller;
use app\index\common\controller\OrderBaseController;
use think\request;


class Order extends OrderBaseController
{
	protected $middleware = ['check'];
    public $serviceMethod = '';
    public function index(Request $request)
    {
        $method = $request->method();
        switch ( $method)
        {
            case 'POST':
            return $this->read();
            break;
            case 'GET':
            return $this->read();
            break;
            default:
            return 3;
        }
    }

    public function read(){
        $this->serviceMethod = "getOrderQuery";
        return $this->getService($this->serviceMethod);
    }

}
