<?php

namespace app\api\model\apps;

use app\common\enum\CardType;
use app\common\model\apps\Card as CardModel;

class Card extends CardModel
{
    /**
     * 获取卡密
     * @param $code
     * @return array|bool|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getCode($code)
    {
        $map['use_uid'] = ['<=', 0];
        $map['use_time'] = ['<=', 0];
        $map['code'] = ['=', $code];
        return $this->where($map)->find();
    }

    /**
     * 卡密列表
     * @param null $keywords
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList($keywords = null, $state = 0, $user)
    {
        $map['code'] = ['like', "%" . $keywords . "%"];
        $map['make_uid'] = ['=', $user['user_id']];
        $state > 0 && $map['use_uid'] = [$state == 2 ? '<>' : '=', 0];
        return $this->where($map)->order("card_id", "desc")->paginate(15, false, [
            'query' => \request()->request()
        ]);
    }

    /**
     * 创建
     * @param $number
     * @param $type
     * @param $user_id
     * @return false|int
     */
    public function add($number, $type, $user, $total,$second=1)
    {
        $this->startTrans();
        if ($user->setDec("balance", $total) && $this->created($number, $type, $user['user_id'],$second)) {
            $this->commit();
            return true;
        }
        $this->rollback();
        return false;
    }
}