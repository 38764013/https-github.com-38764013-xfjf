<?php

namespace app\store\controller;

use app\store\model\Banner as BannerModel;

class Banner extends Controller
{

    /**
     * 文章列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new BannerModel();
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加文章
     * @return array|mixed
     */
    public function add()
    {
        $model = new BannerModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        // 新增记录
        if ($model->add($this->postData('banner'))) {
            return $this->renderSuccess('添加成功', url('banner/index'));
        }
        return $this->renderError($model->getError() ?: '添加失败');
    }

    /**
     * 更新文章
     * @param $banner_id
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function edit($banner_id)
    {
        // 详情
        $model = BannerModel::detail($banner_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('banner'))) {
            return $this->renderSuccess('更新成功', url('banner/index'));
        }
        return $this->renderError($model->getError() ?: '更新失败');
    }

    /**
     * 删除
     * @param $banner_id
     * @return array
     * @throws \think\exception\DbException
     */
    public function delete($banner_id)
    {
        // 详情
        $model = BannerModel::detail($banner_id);
        if (!$model->setDelete()) {
            return $this->renderError($model->getError() ?: '删除失败');
        }
        return $this->renderSuccess('删除成功');
    }
}