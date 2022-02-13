<?php

namespace app\store\controller\apps\card;

use app\store\controller\Controller;
use app\store\model\Setting as SettingModel;

class Setting extends Controller
{
    public function index()
    {
        return $this->updateEvent("card");
    }

    /**
     * 更新商城设置事件
     * @param $key
     * @param $vars
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    private function updateEvent($key, $vars = [])
    {
        if (!$this->request->isAjax()) {
            $vars['values'] = SettingModel::getItem($key);
            return $this->fetch('index', $vars);
        }
        $model = new SettingModel;
        if ($model->edit($key, $this->postData($key))) {
            return $this->renderSuccess('操作成功');
        }
        return $this->renderError($model->getError() ?: '操作失败');
    }
}