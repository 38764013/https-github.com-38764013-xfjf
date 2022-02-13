<?php

namespace app\api\controller\card;

use app\api\controller\Controller;
use app\api\model\apps\Card;
use app\api\model\Setting;
use app\common\enum\CardType;

class Index extends Controller
{
    /**
     * 使用卡密
     * @param $code
     * @return array
     * @throws \app\common\exception\BaseException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function useing($code)
    {
        $user = $this->getUser(true);
        $model = new Card();
        $card = $model->getCode($code);
        if (!$card) {
            return $this->renderError("卡密不存在");
        }
        $user->second = ['inc', $card['number']];
        if ($card['type'] != CardType::SECOND) {
            $user->second = ['inc', $card['second']];
            if (time() > $user->getData("end_time") && $user->getData("end_time")) {
                $date = date("Y-m-d");
            } else {
                $date = $user->getData("end_time") ? $user->end_time : date("Y-m-d");
            }
            $user->end_time = strtotime("+" . $card['number'] . " day", strtotime($date));
        }
        $user->card_type = $card['type'];
        $card->use_uid = $user['user_id'];
        $card->use_time = time();
        if ($user->save() && $card->save()) {
            return $this->renderSuccess([], "兑换成功");
        }
        return $this->renderError("兑换失败");
    }

    /**
     * 卡密列表
     * @param $keywords
     * @return array
     * @throws \think\exception\DbException
     */
    public function lists($keywords, $state = 0)
    {
        $user = $this->getUser(true);
        $model = new Card();
        $lists = $model->getList($keywords, $state, $user);
        return $this->renderSuccess(compact('lists'));
    }

    /**
     * 代理商兑换卡密
     * @param $number
     * @param $type
     * @return array
     * @throws \app\common\exception\BaseException
     * @throws \think\exception\DbException
     */
    public function make($number, $type,$second)
    {
        $user = $this->getUser(true);
        if (!$number || !$type) {
            return $this->renderError("非法参数");
        }
        $price = $this->getBasicsPrice($type);
        $total = ($price * $number * $second);
        if ($total > $user['balance']) {
            return $this->renderError("账户DB不足!");
        }
        $card = new Card();
        if ($card->add($number, $type, $user, $total,$second)) {
            return $this->renderSuccess([], "兑换成功");
        }
        return $this->renderError("兑换失败");
    }

    /**
     * 获取基础兑换比例费用
     * @param $type
     * @return mixed
     */
    private function getBasicsPrice($type)
    {
        $card = Setting::getItem("card");
        switch ($type) {
            case 10:
                $basics = $card['second'];
                break;
            case 20:
                $basics = $card['month'];
                break;
            case 30:
                $basics = $card['quarter'];
                break;
            case 40:
                $basics = $card['year'];
                break;
        }
        return $basics;
    }
}