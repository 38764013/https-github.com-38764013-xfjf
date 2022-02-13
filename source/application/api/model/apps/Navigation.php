<?php


namespace app\api\model\apps;

use app\common\model\apps\Navigation as NavigationModel;

class Navigation extends NavigationModel
{
    /**
     * 列表
     * @param int $category_id
     * @param int $limit
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList($limit = 15)
    {
        return $this->where(['is_delete' => 0])
            ->with(["image"])
            ->select();
    }
}