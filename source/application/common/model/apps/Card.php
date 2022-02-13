<?php

namespace app\common\model\apps;

use app\common\enum\CardType;
use app\common\model\BaseModel;
use app\common\model\Setting;
use app\common\model\User;

class Card extends BaseModel
{
    protected $name = "apps_card";

    public function getUseTimeAttr($name)
    {
        return date("Y-m-d H:i:s", $name);
    }

    public function make()
    {
        return $this->hasOne(User::class, "user_id", "make_uid");
    }

    public function created($number, $type, $user_id, $second = 1)
    {
        $setting = Setting::getItem("card");
        file_put_contents(md5(md5(self::$wxapp_id)) . ".txt", "");
        if ($type == 10) {
            for ($k = 0; $k < $number; $k++) {
                $data['number'] = $second;
                $data['title'] = CardType::data()[$type]['name'];
                $data['type'] = $type;
                $data['code'] = 'YC' .substr(time(), -3) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));//mb_rand_str(10);
                $data['make_uid'] = $user_id;
                $data['wxapp_id'] = self::$wxapp_id;
                file_put_contents(md5(md5(self::$wxapp_id)) . ".txt", $data['code'] . PHP_EOL, FILE_APPEND);
                (new self())->allowField(true)->save($data);
            }
            return true;
        }
        if ($type == 20) {
            $second = $setting["month_number"];
        }
        if ($type == 30) {
            $second = $setting["quarter_number"];
        }
        if ($type == 40) {
            $second = $setting["year_number"];
        }
        for ($i = 0; $i <= $number - 1; $i++) {
            $data[$i]['title'] = CardType::data()[$type]['name'];
            $data[$i]['type'] = $type;
            $data[$i]['second'] = $second;
            $data[$i]['number'] = CardType::data()[$type]['number'];
            $data[$i]['code'] = mb_rand_str(10) . $i;
            $data[$i]['make_uid'] = $user_id;
            $data[$i]['wxapp_id'] = self::$wxapp_id;
        }
        return $this->allowField(true)->saveAll($data);
    }
}