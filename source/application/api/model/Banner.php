<?php

namespace app\api\model;

use app\common\model\Banner as BannerModel;

class Banner extends BannerModel
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
            ->paginate($limit, false, [
                'query' => \request()->request()
            ]);
    }
}