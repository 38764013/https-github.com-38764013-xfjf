<?php


namespace app\store\controller\apps\navigation;


use app\store\controller\Controller;
use app\store\model\apps\Navigation;

class Index extends Controller
{

    /**
     * 列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new Navigation();
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     * @return array|mixed
     */
    public function add()
    {
        $model = new Navigation();
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        // 新增记录
        if ($model->add($this->postData('navigation'))) {
            return $this->renderSuccess('添加成功', url('apps.navigation.index/index'));
        }
        return $this->renderError($model->getError() ?: '添加失败');
    }

    /**
     * 更新
     * @param $navigation_id
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function edit($navigation_id)
    {
        // 详情
        $model = Navigation::detail($navigation_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('navigation'))) {
            return $this->renderSuccess('更新成功', url('apps.navigation.index/index'));
        }
        return $this->renderError($model->getError() ?: '更新失败');
    }

    /**
     * 删除
     * @param $navigation_id
     * @return array
     * @throws \think\exception\DbException
     */
    public function delete($navigation_id)
    {
        // 详情
        $model = Navigation::detail($navigation_id);
        if (!$model->setDelete()) {
            return $this->renderError($model->getError() ?: '删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    public function links()
    {
        return $this->fetch('links');
    }
}