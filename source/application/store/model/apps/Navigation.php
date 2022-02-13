<?php


namespace app\store\model\apps;

use app\common\model\apps\Navigation as NavigationModel;

class Navigation extends NavigationModel
{

    /**
     * 获取列表
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList()
    {
        return $this->with(['image'])
            ->where('is_delete', '=', 0)
            ->paginate(15, false, [
                'query' => request()->request()
            ]);

    }

    /**
     * 新增记录
     * @param $data
     * @return false|int
     */
    public function add($data)
    {
        if (empty($data['image_id'])) {
            $this->error = '请上传封面图';
            return false;
        }
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }

    /**
     * 更新记录
     * @param $data
     * @return bool|int
     */
    public function edit($data)
    {
        if (empty($data['image_id'])) {
            $this->error = '请上传封面图';
            return false;
        }
        return $this->allowField(true)->save($data) !== false;
    }

    /**
     * 软删除
     * @return false|int
     */
    public function setDelete()
    {
        return $this->save(['is_delete' => 1]);
    }
}