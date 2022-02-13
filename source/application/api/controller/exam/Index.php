<?php

namespace app\api\controller\exam;

use app\api\controller\Controller;
use app\api\model\camera\Exam;

class Index extends Controller
{
    /**
     * 获取随机20条考题
     * @return array
     * @throws \app\common\exception\BaseException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function topic()
    {
        $user = $this->getUser(true);
        $model = new Exam();
        $exam = $model->randList($user);
        return $this->renderSuccess(compact("exam"));
    }
}