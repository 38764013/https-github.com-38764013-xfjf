<?php

namespace app\api\controller;

use app\api\model\Banner as BannerModel;

class Banner extends Controller
{
    public function index()
    {
        $model = new BannerModel();
        $banner = $model->getList();
        return $this->renderSuccess(compact("banner"));
    }
}