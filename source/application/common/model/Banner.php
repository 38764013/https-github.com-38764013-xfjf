<?php

namespace app\common\model;

class Banner extends BaseModel
{

    protected $name = 'banner';

    /**
     * 关联封面图
     * @return \think\model\relation\HasOne
     */
    public function image()
    {
        return $this->hasOne('uploadFile', 'file_id', 'image_id');
    }

    /**
     * 详情
     * @param $banner_id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($banner_id)
    {
        return self::get($banner_id);
    }
}