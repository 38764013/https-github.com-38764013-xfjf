<?php

namespace app\api\model;

use app\common\model\camera\Exam;

class CameraExam extends Exam
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
        return $this->orderRaw('rand()')->limit(20)->select();
    }
}