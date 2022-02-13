<?php

namespace app\api\service\recharge;

use app\api\model\recharge\OrderPlan;
use app\api\service\Basics;
use app\api\model\User as UserModel;
use app\api\model\recharge\Order as OrderModel;

//use app\api\model\WxappPrepayId as WxappPrepayIdModel;
use app\api\model\user\BalanceLog as BalanceLogModel;

//use app\common\enum\OrderType as OrderTypeEnum;
use app\common\enum\order\PayType as PayTypeEnum;
use app\common\enum\user\balanceLog\Scene as SceneEnum;
use app\common\enum\recharge\order\PayStatus as PayStatusEnum;
use app\store\model\Setting;

class PaySuccess extends Basics
{
    // 订单模型
    public $model;

    // 当前用户信息
    private $user;

    /**
     * 构造函数
     * PaySuccess constructor.
     * @param $orderNo
     * @throws \think\exception\DbException
     */
    public function __construct($orderNo)
    {
        // 实例化订单模型
        $this->model = OrderModel::getPayDetail($orderNo);
        $this->wxappId = $this->model['wxapp_id'];
        // 获取用户信息
        $this->user = UserModel::detail($this->model['user_id']);
    }

    /**
     * 获取订单详情
     * @return OrderModel|null
     */
    public function getOrderInfo()
    {
        return $this->model;
    }

    /**
     * 订单支付成功业务处理
     * @param int $payType 支付类型
     * @param array $payData 支付回调数据
     * @return bool
     */
    public function onPaySuccess($payType, $payData)
    {
        return $this->model->transaction(function () use ($payType, $payData) {
            $recharge_ratio = Setting::getItem("store",$this->wxappId)['recharge_ratio'];
            // 更新订单状态
            $this->model->save([
                'recharge_ratio' => $recharge_ratio,
                'pay_status' => PayStatusEnum::SUCCESS,
                'pay_time' => time(),
                'transaction_id' => $payData['transaction_id']
            ]);
            if ($this->model["recharge_type"]["value"] == 20) {
                $this->user->setInc('second', $this->model["gift_money"]);
                return true;
            }
            // 计算充值比例
            $this->model['actual_money'] = $recharge_ratio * $this->model['actual_money'];
            // 累积用户余额
            $this->user->setInc('balance', $this->model['actual_money']);
            // 用户余额变动明细
            BalanceLogModel::add(SceneEnum::RECHARGE, [
                'user_id' => $this->user['user_id'],
                'money' => $this->model['actual_money'],
                'wxapp_id' => $this->wxappId,
            ], ['order_no' => $this->model['order_no']]);
            // 更新prepay_id记录
            if ($payType == PayTypeEnum::WECHAT) {
//                WxappPrepayIdModel::updatePayStatus($this->model['order_id'], OrderTypeEnum::RECHARGE);
            }
            return true;
        });
    }

}