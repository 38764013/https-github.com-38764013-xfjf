<?php

namespace app\store\model\apps;

use app\common\model\apps\Card as CardModel;

use app\common\enum\CardType;
class Card extends CardModel
{
    public function getTypeAttr($name)
    {
        return CardType::data()[$name]["name"];
    }
    public function getList($param)
    {
        $data = array_merge([
            'state' => -1,
            'make_uid' => '',
            'code' => '',
            'is_export' => -1
        ], $param);
        $map = [];
        ($data['state'] > -1 && $data['state'] == 1) && $map["use_uid"] = ['<>', ''];
        ($data['state'] > -1 && $data['state'] == 0) && $map["use_uid"] = ['=', ''];
        $data['make_uid'] && $map["make_uid"] = ['=', $data['make_uid']];
        $data['code'] && $map["code"] = ['like', "%" . $data['code'] . "%"];
        if ($data['is_export'] == 1) {
            return $this->where($map)->with(["make"])->select();
        }
        return $this->where($map)->with(["make"])->order("card_id","desc")->paginate(15, false, [
            'query' => request()->request()
        ]);
    }

    public function add($param)
    {
        return $this->created($param["number"], $param["type"], $param["make_uid"],$param['second']);
    }
}