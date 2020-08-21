<?php
namespace app\index\model;

use think\Model;
use think\facade\Log;

class Order extends Model
{
    // 直接使用配置参数名
    protected $table = 'orders';
    public $return_data;
    public function getOrderStatus($data)
    {
//        $map['pay_trade_no']  = '202004081635401407914';
//        $where['order_no']  = '123';
//        $where['_logic'] = 'or';
//        $map['_complex'] = $where;
        $map['para_id']  = $data['userId'];
        $res = $this
            ->field("return_code")
            ->where($map)
            ->where('pay_trade_no|order_no','=',$data['pay_trade_no'])
            ->find();
        if (empty($res)) {
            $this->return_data['message'] = 'no this outTradeNo';
            $this->return_data['status'] = '4';
        }else{
            $this->return_data['status'] = $res['return_code'];
        }
        $this->return_data['outTradeNo'] = $data['pay_trade_no'];
        return $this->return_data;
    }
}