<?php

namespace app\api\model\camera;

use app\common\model\camera\Exam as ExamModel;

class Exam extends ExamModel
{
    /**
     * 随机题库列表
     * @return bool|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function randList()
    {
        return $this->orderRaw('rand()')->where("style", 1)->limit(20)->select();
    }
}