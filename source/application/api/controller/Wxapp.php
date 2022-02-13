<?php

namespace app\api\controller;

use app\api\model\apps\Navigation;
use app\api\model\Wxapp as WxappModel;
use app\api\model\WxappHelp;
use app\store\model\Setting;

/**
 * 微信小程序
 * Class Wxapp
 * @package app\api\controller
 */
class Wxapp extends Controller
{
    /**
     * 分享设置
     * @return array
     */
    public function share()
    {
        $share = Setting::getItem("share");
        return $this->renderSuccess(compact("share"));
    }

    /**
     * 系统基本信息
     * @return array
     */
    public function store()
    {
        $store = Setting::getItem("store");
        $spool = Setting::getItem("spool");
        $inspire = Setting::getItem("inspire");
        return $this->renderSuccess(compact("store", "inspire", "spool"));
    }

    /**
     * 会员卡配置
     * @return array
     */
    public function card()
    {
        $config = Setting::getItem("card");
        return $this->renderSuccess(compact("config"));
    }


    /**
     * 小程序基础信息
     * @return array
     */
    public function base()
    {
//        $wxapp = WxappModel::getWxappCache();
        return $this->renderSuccess([]);
    }

    /**
     * 帮助中心
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function help()
    {
        $model = new WxappHelp;
        $list = $model->getList();
        return $this->renderSuccess(compact('list'));
    }

    public function navigation()
    {
        $model = new Navigation();
        $navigation = $model->getList();
        return $this->renderSuccess(compact("navigation"));
    }
}
